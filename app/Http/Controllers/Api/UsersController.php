<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Stripe\Error\Api;
use Stripe\Error\Card;
use Stripe\Error\Authentication;
use Stripe\Error\InvalidRequest;

class UsersController extends ApiBaseController
{
    protected function getCurrentUserPlan($user)
    {
        foreach (config('payment') as $payment_plan => $payment_details) {

            if ($user->subscribed($payment_plan)) {
                return $payment_plan;
            }
        }

        return null;
    }

    public function subscription(Request $request)
    {
        $data = $request->all();
        $user = $this->user->user();

        //write a function to see if user already subscriber to a plan or not.

        $userSubscribedPlan = $this->getCurrentUserPlan($user);

        if ($userSubscribedPlan && $userSubscribedPlan == $data['payment_plan']) {
            return $this->apiResponse->responseAlreadySubscription();
        }

        $message = null;
        try {
            if ($userSubscribedPlan) {
                $user->subscription($data['payment_plan'])
                    ->swap();
            } else {
                $user->subscription($data['payment_plan'])
                    ->create($data['token_id'], ['email' => $email]);
            }
        } catch (InvalidRequest $e) {
            $message = $e->getMessage();
        } catch (Authentication $e) {
            $message = $e->getMessage();
        } catch (Card $e) {
            $message = $e->getMessage();
        } catch (Api $e) {
            $message = $e->getMessage();
        }

        if ($message) {
            return $this->apiResponse->responseFailedSubscription($message);
        }

        PaymentHistory::create(array(
            'user_id' => $user->id,
            'plan' => $data['payment_plan'],
            'payment_method' => $data['brand']
        ));
    }
}
