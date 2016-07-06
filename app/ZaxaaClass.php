<?php

namespace App;

class ZaxaaClass
{

    public function zpn()
    {
        /*
         * Zaxaa Payment Notification (ZPN) Sample Code
         * For more info about the ZPN variables, please visit:
         * http://www.zaxaa.com/p/zpn-pdt-vars
         */

        $signature = 'YOUR API SIGNATURE HERE'; // change this value with your own api signature
        if (!empty($_POST['trans_type'])) {
            // Read POST data and validate the ZPN
            $transType = $_POST['trans_type'];
            $transReceipt = $_POST['trans_receipt'];
            $transAmount = $_POST['trans_amount'];
            $sellerID = $_POST['seller_id'];
            $hashKey = $_POST['hash_key'];

            $myHashKey = strtoupper(md5($sellerID . $signature . $transReceipt . $transAmount));
            if ($myHashKey == $hashKey) {
                // ZPN is valid
                // Do something...

                // You can do more validation like matching your seller ID
                // or matching your email address...
                // or validate the received amount...

                $products = $_POST['products'];
                switch ($transType) {
                    case 'SALE':
                        // New payment for one-time product(s)
                        foreach ($products as $product) {
                            // This ZPN may contain a payment for multiple products
                            // do something for each of the product here..
                            $sku = $product['prod_number'];
                        }
                        break;

                    case 'FIRST_BILL':
                        // New payment for a subscription product(s)
                        foreach ($products as $product) {
                            // This ZPN may contain a payment for multiple products
                            // do something for each of the product here..

                            $sku = $product['prod_number'];
                            // NOTE: If this is a ZPN for OTO with a subscription product,
                            // then this ZPN may also contain information for one-time product(s)
                            if ($product['payment_type'] == 'subscription') {
                                // The product is a subscription
                                // do something...
                            } else if ($product['payment_type'] == 'onetime') {
                                // The product is a one-time...
                                // do something...
                            }
                        }
                        break;

                    case 'REBILL':
                        // Recurring payment received
                        foreach ($products as $product) {
                            $sku = $product['prod_number'];
                            $recurring_id = $product['recurring_id']; // This might be useful to recognize past recurring payments
                            // do something...
                        }
                        break;

                    case 'CANCELED':
                        // Subscription is canceled
                        foreach ($products as $product) {
                            $sku = $product['prod_number'];
                            $recurring_id = $product['recurring_id']; // This might be useful to recognize past recurring payments
                            // do something...
                        }
                        break;

                    case 'REFUND':
                        // Refunded payment...
                        foreach ($products as $product) {
                            $sku = $product['prod_number'];
                            // do something...
                        }
                        break;
                }
            } else {
                // ZPN is Invalid
                // log for manual investigation
            }
        }
    }

    public function pdt()
    {
        /*
         * Zaxaa Payment Data Transfer (PDT) Sample Code
         * For more info about the PDT variables, please visit:
         * http://www.zaxaa.com/p/zpn-pdt-vars
         */

        define('PDT_URL', 'https://www.zaxaa.com/notify/pdt');
        define('API_SIGNATURE', 'YOUR API SIGNATURE HERE');

        if (!isset($_GET['tx'])) {
            // no 'tx' variable found...
            // do something here...
        }

        $tx = $_GET['tx']; // token transaction
        $postfields = 'sid=' . API_SIGNATURE . '&tx=' . $tx;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, PDT_URL);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($code == 200) {
            // Zaxaa PDT is valid...
            // Do some action here...
            $vars = urldecode($response);
            parse_str($vars, $post);

            $transType = $post['trans_type'];
            $transReceipt = $post['trans_receipt'];
            $transAmount = $post['trans_amount'];
            $sellerID = $post['seller_id'];
            $products = $post['products'];
        }
    }

}