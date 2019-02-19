<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redis;

class CartController extends Controller
{
    //
    public function addGoods() {
        $activity = DB::table('sup_activity')->first();

        if ($activity->number <= 0) {
            return response()->json([
                'code' => '400',
                'msg' => '没有了',
            ]);
        }

        $goods = DB::table('sup_goods')->first();
        $goods = get_object_vars($goods);
        // 用户登录
        usleep(10000);
        $uid = 1;
        $order = DB::table('sup_orders')->insertGetId([
            'goods_id' => $goods['id'],
            'goods_price' => $goods['goods_price'],
            'order_price' => $goods['goods_price'],
            'goods_unit' => $goods['goods_unit'],
            'goods_number' => 1,
            'order_status' => 1,
            'status' => 1,
            'user_id' => $uid,
        ]);
        // 减去库存
        DB::table('sup_activity')->where([
            'id' => $activity->id
        ])->update([
            'number' => $activity->number - 1
        ]);
        DB::table('sup_goods')->where([
            'id' => $goods['id']
        ])->update([
            'goods_number' => $goods['goods_number'] - 1
        ]);

        return response('结束' . $activity->number, 200);
    }

    public function addGoods2() {
        $goods = Redis::rpop('goods');
        if (empty($goods)) {
            return response('结束了', 200);
        }
        $goods = json_decode($goods, 1);

        $list = Redis::lrange('cart_list', 0, -1);
        $num = count($list);
        Redis::lpush('cart_list', json_encode([
            'uid' => ++$num,
            'goods_name' => $goods['goods_name'],
        ]));
        return response('第' . ($num) . '个', 200);
    }

    public function redisList () {

        $list = Redis::lrange('cart_list', 0, -1);
        $goods = Redis::lrange('goods', 0, -1);
        dd($list, $goods);
    }

    public function redisAdd() {
        for ($i = 0;$i < 10; ++$i) {
            Redis::lpush('goods', json_encode([
                'goods_name' => '商品_' . $i,
            ]));
        }
    }

    public function redisDel() {
        $val = Redis::rpop('cart_list');
        $val = Redis::rpop('goods');
        $list = Redis::lrange('cart_list', 0, -1);
        $goods = Redis::lrange('goods', 0, -1);
        dd($list, $goods);
    }
}
