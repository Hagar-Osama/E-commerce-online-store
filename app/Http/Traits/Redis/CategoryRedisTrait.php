<?php
namespace App\Http\Traits\Redis;

use App\Models\Category;
use Illuminate\Support\Facades\Redis;

trait CategoryRedisTrait
{
    private function setCategoryToRedis()
    {
        $redis = Redis::connection();
        $data = Category::get();
        $redis->set('category', $data);
        return true;
    }

    private function getCategoryFromRedis($limit = null)
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('category'));

        if (is_null($limit))
            $data = array_slice($data,0, $limit);

        if (empty($data))
            $data = Category::get();
        return $data;

    }
}
