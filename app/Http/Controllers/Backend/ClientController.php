<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\Notification;
use Validator;
use Carbon\Carbon;
use Auth;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(Request $request)
    // {
    //     $this->middleware('auth');
    //     $this->request = $request;
    // }
    
    public function index()
    {
         $users= Client::find('8')->notification->value('result');
        var_dump($users); die();
        $clients=Client::get();
        $counts = Notification::count();
        return view('backend.client',compact('clients','counts'));
    }


    public function list()
    {
        return Client::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::orderBy('priority', 'ASC')->get();
        return view('backend.view',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $rules=array(
        //     'c_name'=> 'required',
        //     'c_address'=>'required',
        //     'c_phone' =>'required|numeric',
        //     'p_email' => 'required|unique:clients',
        // );
        // $validator= Validator::make(Input::all(), $rules);
        // if($validator->fails()){
        //     return redirect('/home/client')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        $clients=new Client;
        $clients->c_name=Input::get('c_name');
        $clients->c_address=Input::get('c_address');
        $clients->c_phone=Input::get('c_phone');
        $clients->c_description=Input::get('c_description');
        $clients->mediator=Input::get('mediator');
        $clients->m_phone=Input::get('m_phone');
        $clients->firstmeet_date=Input::get('firstmeet_date');
        $clients->en_firstmeet_date=Input::get('en_firstmeet_date');
        $clients->p_name=Input::get('p_name');
        $clients->p_number=Input::get('p_number');
        $clients->p_email=Input::get('p_email');
        $clients->p_designation=Input::get('p_designation');
        $priority=Input::get('checkbox');
        $clients->priority=$priority;
        $clients->created_by= Auth::user()->id;
        if($clients->save()){
            $clients_notify= new Notification;
            $clients_notify->client_id = $clients->id;
            $clients_notify->a_date=Input::get('nextmeet_date');
            $clients_notify->en_date=Input::get('en_nextmeet_date');
            $clients_notify->a_time="12:00";
            $clients_notify->result="Next Meeting";
            $clients_notify->created_by= Auth::user()->id;
            $clients_notify->save();
        }
        return redirect('/home/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $notifications=Notification::orderBy('a_date','DESC')->get();
        $clients=Client::get();
        $counts = Notification::count();
        $main_id=$id;
        $notifications=Notification::where('client_id', $main_id)->orderBy('a_date', 'desc')->get();
        $datas=Client::where('id', $id)
                        ->orderBy('priority', 'ASC')
                        ->get();
        return view('backend.client-show',compact('datas','clients','notifications','counts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::where('id', $id)->get();
        return view('backend.client-edit',compact('clients','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clients=Client::find($id);
        $check = Client::where('id',$id)->value('is_approve');
        // var_dump($check); die();
        if ($check == '1') {
            $clients->is_approve = "0";
        }else{
            $clients->is_approve = "1";
        }
        $clients->update();
        return back()->withInput();
    }
    public function update2(Request $request, $id)
    {
        $clients=Client::find($id);
        $clients->c_name=Input::get('c_name');
        $clients->c_address=Input::get('c_address');
        $clients->c_phone=Input::get('c_phone');
        $clients->c_description=Input::get('c_description');
        $clients->mediator=Input::get('mediator');
        $clients->m_phone=Input::get('m_phone');
        $clients->firstmeet_date=Input::get('firstmeet_date');
        $clients->en_firstmeet_date=Input::get('en_firstmeet_date');
        $clients->p_name=Input::get('p_name');
        $clients->p_number=Input::get('p_number');
        $clients->p_email=Input::get('p_email');
        $clients->p_designation=Input::get('p_designation');
        $priority=Input::get('checkbox');
        $clients->priority=$priority;
        $clients->created_by= Auth::user()->id;
        if($clients->update()){
            $clients_notify= new Notification;
            $clients_notify->client_id = $clients->id;
            $clients_notify->a_date=Input::get('nextmeet_date');
            $clients_notify->en_date=Input::get('en_nextmeet_date');
            $clients_notify->a_time="12:00";
            $clients_notify->result="Next Meeting";
            $clients_notify->created_by= Auth::user()->id;
            $clients_notify->update();
        }
        return redirect('/home/client');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::find($id);
        $clients->delete();
        return redirect('/home');
    }

    public function live(Request $request)
    {
     if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data =  Client::where('c_name', 'like', '%'.$query.'%')
                ->orderBy('priority', 'ASC')
                ->get();
            }
            else
            {
                $data = Client::orderBy('priority', 'ASC')->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $client)
                {
                    if($client->priority == 1){
                        $text = "text-danger";
                        $display="High";
                    }elseif($client->priority == 2){
                        $text = "text-success";
                        $display= "Medium";
                    }
                    else{
                        $text = "text-warning";
                        $display= "Low";
                    }
                    $date = $client->getScheduleCountLatest()->value('a_date');

                    $output .= '
                    <tr>
                    <td>'.$key.'</td>
                    <td>'.$client->c_name.'</td>
                    <td>'.$date.'</td>
                    <td><i class="fas fa-square '.$text.'"></i>'. $display.'</td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output = '
                <tr>
                <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
            );
            echo json_encode($data);
        }
    }
    
   
}
