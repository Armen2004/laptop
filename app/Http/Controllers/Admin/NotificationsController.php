<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $notifications = Notification::paginate(15);

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'custom_notification_content' => 'required' ]);

        Notification::create($request->all());

        Session::flash('flash_message', 'Notification added!');

        return redirect('admin/notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        return view('admin.notifications.show', compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        Notification::destroy($id);

        Session::flash('flash_message', 'Notification deleted!');

        return redirect('admin/notifications');
    }
}
