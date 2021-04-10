<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function convertToArray($array)
      {
        $result = array();
        foreach ($array as $object)
        {
          $result[] = (array) $object;
        }
        return $result;
      }

      public static function fetchstate(Request $req)
      {
      	$state = DB::table('states')->get();
      	//$state = json_encode($state);
      	return json_encode($state);

      }

      public static function fetchdistrict(Request $req)
      {
      	$state_id = $req->input('state_id');
      	$dis_list = DB::table('districts')->where('state_id',$state_id )->get();
      	return json_encode($dis_list);
      }

      public static function fetchca(Request $req)
      {


      	$district_id = $req->input('district_id');
      	$poll_list = DB::table('caname')->where('district_id',$district_id )->get();
      	return json_encode($poll_list);

      }

    public static function index(Request $req)
    {

    	$state = DB::select('drop table CAname');
    	return $state;
    	//$state = strtoupper($state);
    	$state_id = DB::table('states')->where('states',$state )->get();
    	 return $state_id;
    	// $user = DB::table('districts')->where('state_id', )->first();
     //     $users = DB::select('select * from voterlist');
     //   	//  $arr = ['TINKU','DEVI'];
			  //   // for($i = 0;$i<count($arr);$i++)
			  //   // {
			  //   // 	DB::table('voterlist')->insert(
     //   	//    ['poll_id' => 648715841436876801, 'votername' => $arr[$i]]
     //   	//    );
			  //   // }


			
		
                                                    
     //    //return view('sendotp');
     //   	echo json_encode($users);
    }
}
