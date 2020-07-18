<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use App\Notification;
use App\Client;
use Auth;



class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    
    public function index()
    {
        $clients=Client::get();
        return view('backend.notification',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notifications=new Notification();
        $notifications->result=Input::get('result');
        $notifications->a_date=Input::get('a_date');
        $notifications->en_date=Input::get('en_date');
        $notifications->a_time=Input::get('a_time');
        $notifications->client_id=Input::get('client_id');
        $notifications->created_by=Auth::user()->id;
        $notifications->save();
        return back()->withInput();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $clients=Client::get();
        $main_id = $id;
        $notifications=Notification::where('client_id', $main_id)->orderBy('a_date', 'desc')->get();
        $count_a=count($notifications);
        return view('backend.notification-edit',compact('main_id','notifications','count_a','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifications = Notification::find($id);
        $notifications->delete();
        return back()->withInput();
    }
    
}
