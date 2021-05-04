<?php

namespace App\Http\Controllers;

use App\Models\MasterKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stat = auth()->user()->status;
        if($stat == 'Active') {
        	return view('pages.dashboard');
        } else {
        	return Redirect::to('/auth/login')->with('message',"Get approval from Admin Team from BrandIdea !!! Thank You");
        }
        
    }
    public function show($id=259609)
    {
    	$this->getChildren($id=259609);
    }
    public function getChildren($id=259609) {
    	$user = DB::table('167_menu')->where([ ['parent_id', '=', $id ], ['stat', '=', 'A'] ])->get();
    	
        
            // $sql="select refid,menu_name,is_child,parent_id,stat from menu_master where parent_id=".$id."";
            // $query = yii::$app->db->createCommand($sql)->queryAll();    

            // $array=[];
            // $i=0;
            foreach ($user as $key => $value) {

                // $temp=array();
                // $temp['refid']=$value->refid;
                $menu_name = addslashes($value->menu_name);
                // $temp['is_child']=$value->is_child;
                // $temp['parent_id']=$value->parent_id;
                // $temp['stat']=$value->stat;


                echo "INSERT INTO menu_master (`refid`, `menu_name`, `level_id`, `menu_id`, `menu_item_id`, `is_child`, `app_img`, `operators_flag`, `parent_id`, `prnt_lvlid`, `order_fld`, `stat`, `partkey`) VALUES ( '$value->refid', '$menu_name', '$value->level_id', '$value->menu_id', '$value->menu_item_id', '$value->is_child', '$value->app_img', '$value->operators_flag', '$value->parent_id', '$value->prnt_lvlid', '$value->order_fld', '$value->stat', '3');";
                //echo $qry6;

			$user_child = DB::table('167_menu')->where([['parent_id', '=', $value->refid ], ['stat', '=', 'A']])->get();
             
            // $sql="select count(*) from menu_master where parent_id=".$value['refid']."";
            // $res = yii::$app->db->createCommand($sql)->queryScalar();    
               
                foreach ($user_child as $key2 => $value2) {
                    echo $this->getChildren($value2->refid);
                    //echo $value2->refid . "</br>";
                }
            
            }

           // return null;
    }

}
