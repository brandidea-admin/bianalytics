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
    public function show($id=0)
    {
    	var_dump(json_encode($this->getChildren(0)));
    }
    public function getChildren($id=0) {
    	$user = DB::table('167_menu')->where([ ['parent_id', '=', $id ], ['stat', '=', 'A'] ])->get();
    	

            // $sql="select refid,menu_name,is_child,parent_id,stat from menu_master where parent_id=".$id."";
            // $query = yii::$app->db->createCommand($sql)->queryAll();    


            $array=[];
            $i=0;
            foreach ($user as $key => $value) {

                $temp=array();
                $temp['refid']=$value->refid;
                $temp['menu_name']=$value->menu_name;
                $temp['is_child']=$value->is_child;
                $temp['parent_id']=$value->parent_id;
                $temp['stat']=$value->stat;

			$user_child = DB::table('167_menu')->where('parent_id', $value->refid)->count();
             
            // $sql="select count(*) from menu_master where parent_id=".$value['refid']."";
            // $res = yii::$app->db->createCommand($sql)->queryScalar();    
               
               if($user_child > 0)
              { 
                 array_push($array,$temp);
                 $array[$i]['sublist']=array();
                 array_push($array[$i]['sublist'],$this->getChildren( $value->refid));
              }
               else
                $array[$i]=array($temp);
            $i++;
            }

            return $array;
    }

}
