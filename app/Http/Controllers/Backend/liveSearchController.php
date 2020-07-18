<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Client;
use Carbon;

class liveSearchController extends Controller
{
     function index()
    {
    	$clients=Client::get();
     return view('backend.live_search',compact('clients'));
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		$output = '';
    		$query = $request->get('query');
    		if($query != '')
    		{
    			$data =  Notification::where('a_date', 'like', '%'.$query.'%')
    			->orderBy('id', 'desc')
    			->get();
    		}
    		else
    		{
    			$data = Notification::get();
    		}
    		$total_row = $data->count();
    		if($total_row > 0)
    		{
    			foreach($data as $key => $client)
    			{
    				if($client->priority == 1){
    					$text = "text-danger";
    					$display="High";
    				}else{
    					$text = "text-success";
    					$display= "Low";
    				}
    				$output .= '
    				<tr>
    				<td>'.$key.'</td>
                    <td>'.$client->client->c_name.'</td>
    				<td>'.$client->a_date.'</td>
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
