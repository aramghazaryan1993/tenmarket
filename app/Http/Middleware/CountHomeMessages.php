<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
use Illuminate\Support\Facades\DB;

class CountHomeMessages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    $CountPradam = DB::select("select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from sell_orders so
                      inner join
                      (select to_id, from_id,product_id,min(ifnull(view,0)) as view, product_type from messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  )   group by from_id, to_id,product_id, product_type) m on so.id = m.product_id
                      inner join users u on u.id=m.from_id
                      where m.to_id=".Auth::id()." and m.product_type=1 and m.view = 0
                      order by view ASC
                  ");

    $CountKuplyu  = DB::select("  select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from buy_orders so
                    inner join
                    (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) group by from_id, to_id,product_id, product_type)  m on so.id = m.product_id
                    inner join users u on u.id=m.from_id
                    where m.to_id= ".Auth::id()." and m.product_type=2 and m.view = 0
                    order by view asc
                ");

    $CountTenOrders  = DB::select("select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from ten_orders so
                        inner join
                        (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) group by from_id, to_id,product_id, product_type)
                          m on so.id = m.product_id
                        inner join users u on u.id=m.from_id
                        where m.to_id= ".Auth::id()."
                        and m.product_type=3 and m.view = 0
                        order by view asc
                        ");

    $CountRequestmessages = DB::select("
                        select DISTINCT u.id, u.name, u.img, u.updated_at, min(ifnull(view,0)) as view from messages  m
                        inner join   users u on u.id=m.from_id  where m.to_id=".Auth::id()." and m.product_type=4 and from_id<>".Auth::id()."  and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) and m.product_id IS NULL
                        group by  m.from_id, m.to_id, m.product_type
                        order by view ASC

                    ");




                    //dd($CountRequestmessages);
    $a = count($CountPradam);
    $b = count($CountKuplyu);
    $c = count($CountTenOrders);
   // $d = count($CountRequestmessages);
     $CountMessage = $a + $b + $c;


    foreach($CountRequestmessages  as $valR)
    {
        if($valR->view == 0)
        {
            $a =  count(array($valR->view));
           echo array_sum(array($a));
            //break;
        }else{
            // echo $CountMessage;
            // break;
        }

    }
   // echo $a;

    // foreach($CountPradam  as $valP)
    // {
    //     if($valP->view == 0)
    //     {
    //         dd(count($CountPradam));
    //         session(['SCountPradam' => count($CountPradam)]);
    //     }
    // }

    // foreach($CountKuplyu  as $valK)
    // {
    //     if($valK->view == 0)
    //     {
    //         dd(count($CountKuplyu));
    //         session(['SCountKuplyu' => count($CountKuplyu)]);
    //     }
    // }

    // foreach($CountTenOrders  as $valT)
    // {
    //     if($valT->view == 0)
    //     {
    //         dd(count($CountTenOrders));
    //         session(['SCountTenOrders' => count($CountTenOrders)]);
    //     }
    // }


    // foreach($CountRequestmessages  as $valR)
    // {
    //     if($valR->view == 0)
    //     {
    //         dd(count($CountTenOrders));
    //         session(['SCountRequestmessages' => count($CountRequestmessages)]);
    //     }
    // }


    // $a = session('SCountPradam');
    // $b = session('SCountKuplyu');
    // $c = session('SCountTenOrders');
    // $d = session('SCountRequestmessages');

    // $CountMessage = $a + $b + $c + $d;

          View::composer(['includes.default.header_kabinet_menu'], function($view) use($CountMessage) {
                        $view->with('ShowCountMessage',$CountMessage);
                        });
        return $next($request);
    }
}
