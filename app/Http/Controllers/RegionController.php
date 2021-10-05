<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Session;


class RegionController extends Controller
{

  public function CountDay()
    {
        // Count praduct limit Day
        date_default_timezone_set('Asia/Yerevan');
        $now  = time() - 30 * 60 * 60 *24;
        $time = date('Y-m-d h:i:s', $now);
          return $time;
    }

    public function GetCountryID(Request $request)
    {
        $region_id = DB::table('region_list')->where('region', $request->region)->first();

        $lifetime  = time() + 60 * 60 * 24 * 365;// one year
        return Cookie::queue("region_id", $region_id->id, $lifetime);
           //return $request->session()->put('region_id',$region_id->id);
    }


    public function BuyAdvertising(Request $request)
    {
        //Select Buy Advertising Куплю praduct
        $GetBuyAdvertising = DB::table('buy_orders')
        ->select('buy_orders.id','buy_orders.description','buy_orders.confirmation_date', 'img_buy_orders.img','buy_advertising_region.type_position')
        ->join('img_buy_orders', 'img_buy_orders.buy_orders_id', '=', 'buy_orders.id')
        ->join('buy_advertising_region', 'buy_advertising_region.buy_orders_id', '=', 'buy_orders.id')
        ->where('img_buy_orders.home_image', '=', '1')
        ->where('buy_advertising_region.region_id', '=',  Cookie::get('region_id'))
        ->whereDate('buy_advertising_region.confirmation_date', '>', $this->CountDay())
        ->get();


               return View::composer(['includes.home.reklam_left','includes.home.reklam_right'], function($view) use($GetBuyAdvertising) {
                    $view->with('GetBuyAdvertising',$GetBuyAdvertising);
                    });
    }

    public function SellAdvertising(Request $request)
    {
        //Select Sell Advertising Продам praduct
        $GetSellAdvertising = DB::table('sell_orders')
        ->select('sell_orders.id','sell_orders.description','sell_orders.confirmation_date', 'img_sell_orders.img','sell_advertising_region.type_position')
        ->join('img_sell_orders', 'img_sell_orders.sell_orders_id', '=', 'sell_orders.id')
        ->join('sell_advertising_region', 'sell_advertising_region.sell_orders_id', '=', 'sell_orders.id')
        ->where('img_sell_orders.home_image', '=', '1')
        ->where('sell_advertising_region.region_id', '=',  Cookie::get('region_id'))
        ->whereDate('sell_advertising_region.confirmation_date', '>', $this->CountDay())
        ->get();


               return View::composer(['includes.home.reklam_left','includes.home.reklam_right'], function($view) use($GetSellAdvertising) {
                    $view->with('GetSellAdvertising',$GetSellAdvertising);
                    });
    }


    public function TenOrdersAdvertising(Request $request)
    {
        //Select TenOrders Advertising Заявки на изготовление ТЭНов praduct
        $GetTenOrdersAdvertising = DB::table('ten_orders')
        ->select('ten_orders.id','ten_orders.description','ten_orders.confirmation_date', 'img_ten_orders.img','ten_advertising_region.type_position')
        ->join('img_ten_orders', 'img_ten_orders.ten_orders_id', '=', 'ten_orders.id')
        ->join('ten_advertising_region', 'ten_advertising_region.ten_orders_id', '=', 'ten_orders.id')
        ->where('img_ten_orders.home_image', '=', 1)
        ->where('ten_advertising_region.region_id', '=',  Cookie::get('region_id'))
        ->whereDate('ten_advertising_region.confirmation_date', '>', $this->CountDay())
        ->get();


               return View::composer(['includes.home.reklam_left','includes.home.reklam_right'], function($view) use($GetTenOrdersAdvertising) {
                    $view->with('GetTenOrdersAdvertising',$GetTenOrdersAdvertising);
                    });
    }

    public function ArganizacyaAdvertising(Request $request)
    {
        //Select Arganizacya Advertising Список организаций praduct
        $GetArganizacyaAdvertising = DB::table('companies')
        ->select('companies.id','companies.name','companies.email','companies.img','companies.phone_number','companies_advertising_region.type_position')
        ->join('companies_advertising_region', 'companies_advertising_region.companie_orders_id', '=', 'companies.id')
        ->where('companies_advertising_region.region_id', '=',  Cookie::get('region_id'))
        ->whereDate('companies_advertising_region.confirmation_date', '>', $this->CountDay())
        ->get();


               return View::composer(['includes.home.reklam_left','includes.home.reklam_right'], function($view) use($GetArganizacyaAdvertising) {
                    $view->with('GetArganizacyaAdvertising',$GetArganizacyaAdvertising);
                    });
    }


}
