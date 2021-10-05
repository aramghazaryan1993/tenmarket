<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\PradamModel;
use App\PradamImgModel;
use App\KuplyuModel;
use App\KuplyuImgModel;
use App\TenOrdersModel;
use App\TenOrdersImgModel;
use App\ArganizacyaModel;
use App\User;



class HomeController extends RegionController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function CountDay()
    {
        // Count praduct limit Day
        date_default_timezone_set('Asia/Yerevan');
        $now  = time() - 30 * 60 * 60 *24;
        $time = date('Y-m-d h:i:s', $now);
          return $time;
    }

    public function ShowPradam()
    {
        //Select Pradam praduct
        $ShowPradam = PradamModel::select('id','description','confirmation_date')
        ->whereDate('confirmation_date', '>', $this->CountDay())
        ->inRandomOrder()
        ->limit(8)
        ->get();

        foreach($ShowPradam as $value){
            $ShowImg = PradamImgModel::where('sell_orders_id',$value->id)->where('home_image',1)->first();
            $value->ShowImg = $ShowImg;
        }
        return $ShowPradam;
    }

    public function ShowKuplyu()
    {
        //Select Kuplyu praduct
        $ShowKuplyu = KuplyuModel::select('id','description','confirmation_date')
        ->whereDate('confirmation_date', '>', $this->CountDay())
        ->inRandomOrder()
        ->limit(8)
        ->get();

        foreach($ShowKuplyu as $value){
            $ShowImg = KuplyuImgModel::where('buy_orders_id',$value->id)->where('home_image',1)->first();
            $value->ShowImg = $ShowImg;
        }
        return $ShowKuplyu;
    }

    public function ShowTenOrders()
    {
        //Select Заявки на изготовление ТЭНов praduct
        $ShowTenOrders = TenOrdersModel::select('id','description','confirmation_date')
                         ->whereDate('confirmation_date', '>', $this->CountDay())
                         ->inRandomOrder()
                         ->limit(8)
                         ->get();

        foreach($ShowTenOrders as $value){
            $ShowImg = TenOrdersImgModel::where('ten_orders_id',$value->id)->where('home_image',1)->first();
            $value->ShowImg = $ShowImg;
        }
        return $ShowTenOrders;
    }

    public function ShowArganizacya()
    {
        $ShowArganizacya = ArganizacyaModel::inRandomOrder()
                           ->whereDate('confirmation_date', '>', $this->CountDay())
                           ->limit(8)
                           ->get();

        return  $ShowArganizacya;
    }

    public function index(request $request)
    {

        $this->BuyAdvertising($request); // return check Region BuyAdvertising
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        $ShowPradam      = $this->ShowPradam();
        $ShowKuplyu      = $this->ShowKuplyu();
        $ShowTenOrders   = $this->ShowTenOrders();
        $ShowArganizacya = $this->ShowArganizacya();

        return view('home',['ShowPradam' => $ShowPradam, 'ShowKuplyu' => $ShowKuplyu,'ShowTenOrders' => $ShowTenOrders, 'ShowArganizacya' => $ShowArganizacya ]);
    }

    public function OwnPage(request $request)
    {
        //return view('ownpage');


    }


}
