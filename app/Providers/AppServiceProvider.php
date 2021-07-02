<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menuarr2 = array();
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                if(Auth::user()->user_type == "Admin") {
                    $menu1 = DB::table('menus')->select('refid','menu_name')->where('parent_id', 0)->where('stat', '=', 'A')->orderBy('order_fld','ASC')->get();
                } else {
                    $menu1 = DB::table('menus')->select('refid','menu_name')->whereIn('refid', explode(",", Auth::user()->menus))->where('parent_id', 0)->where('stat', '=', 'A')->orderBy('order_fld','ASC')->get();
                }
                foreach($menu1 as $submenus) {
                    //echo $submenus->refid . "</br></br>";
                    $menu2 = DB::table('menus')->select('refid', 'menu_name', 'is_child', 'parent_id')->where('parent_id', $submenus->refid)->where('stat', '=', 'A')->orderBy('order_fld','ASC')->get();
                    foreach($menu2 as $menudiv){
                        $menuarr2[$submenus->refid][$menudiv->refid] = $menudiv->menu_name;
                    }
                }
                // echo "<pre>";
                // print_r($menu1);
                // exit;
                if(empty($menu1)) { $menu1 = array(); $menuarr2 = array(); }
                $view->with('usrmenus', $menu1)->with('menuarr2',$menuarr2);
            } else {
                $view->with('currentUser', null);
            }
        });

    }
}
