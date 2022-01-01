<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Redis;

trait ColorsTrait
{
    /**
     * @return \Illuminate\Redis\Connections\Connection
     * @param $data
     *
     * Redis Connections
     *
     */

    private function ConnectToRedis()
    {
        return Redis::connection();
    }

    private function setColorsDataToRedis()
    {
        $data = $this->getAllColorFromDB();
        $this->ConnectToRedis()->set('colors',$data);
        return true;
    }

    private function getColorsDataFromRedis()
    {
        return json_decode($this->ConnectToRedis()->get('colors'));
    }

    private function getColorByIDFromRedis($id)
    {
        $color = json_decode($this->ConnectToRedis()->get('colors'));
        return $color[array_search($id, array_column($color, 'id'))];
    }


    /*
     * DataBase Connections
     */

    public function getColorByIdFromDB($id)
    {
        return $this->colorModel::find($id);
    }

    public function getAllColorFromDB()
    {
        return $this->colorModel::get();
    }

}
