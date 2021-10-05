<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use View;
// use App\Http\Controllers\ShowProfile;
use Illuminate\Support\Facades\Session;
use Route;

class AdvertisingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->CountDay();
        // $this->GetCountryID();
        // $this->BuyAdvertising();
        // $this->test();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {




    }

    private function test()
    {
       // echo Session::get('ok');
    }

    private function CountDay()
    {
        // Count praduct limit Day
        // date_default_timezone_set('Asia/Yerevan');
        // $now = time() - 30 * 60 * 60 *24;
        // $time = date('Y-m-d h:i:s', $now);
        //   return $time;
    }

    private function GetCountryID()
    {
        //  $region_name = 'Амурская область';
        // //echo $s = '<div class="new"></div>';
        // $region_id = DB::table('region_list')->where('region', $region_name)->first();
        //   return $region_id->id;
    }

    private function BuyAdvertising()
    {
        // //Select Buy Advertising Куплю praduct
        // $GetBuyAdvertising = DB::table('buy_orders')->select('buy_orders.id','buy_orders.description','buy_orders.confirmation_date', 'img_buy_orders.img','buy_advertising_region.type_position')
        // ->join('img_buy_orders', 'img_buy_orders.buy_orders_id', '=', 'buy_orders.id')
        // ->join('buy_advertising_region', 'buy_advertising_region.buy_orders_id', '=', 'buy_orders.id')
        // ->where('img_buy_orders.home_image', '=', '1')
        // ->where('buy_advertising_region.region_id', '=', $this->GetCountryID())
        // ->whereDate('buy_advertising_region.confirmation_date', '>', $this->CountDay())
        // ->get();

        //   foreach($GetBuyAdvertising as $value)
        //   {
        //         View::composer(['includes.home.reklam_left','includes.home.reklam_right'], function($view) use($GetBuyAdvertising) {
        //             $view->with('GetBuyAdvertising',$GetBuyAdvertising);
        //             });
        //   }

    }

}
