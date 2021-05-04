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
                $menu1 = DB::table('menu_master')->select('refid','partkey','menu_name')->whereIn('partkey', explode(",", Auth::user()->menus))->where('parent_id', 0)->orderBy('order_fld','ASC')->get();
                foreach($menu1 as $submenus){
                    //echo $submenus->refid . "</br></br>";
                    $menu2 = DB::table('menu_master')->select('refid', 'menu_name', 'is_child', 'parent_id', 'partkey')->where('parent_id', $submenus->refid)->orderBy('order_fld','ASC')->get();
                    foreach($menu2 as $menudiv){
                        $menuarr2[$submenus->partkey][$menudiv->refid] = $menudiv->menu_name;
                    }
                }
                // echo "<pre>";
                // print_r($menu1);
                // exit;
                $view->with('usrmenus', $menu1)->with('menuarr2',$menuarr2);
            } else {
                $view->with('currentUser', null);
            }
        });

    }
}
