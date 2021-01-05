<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SummeryDetail;
use Carbon\Carbon;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'OrderType'     => $this->ordertype,
            'Address'       => $this->addresses->name,
            'StoreId'       => $this->store_id,
            'StartTime'     => $this->starttime,
            'EndTime'       => $this->endtime,
            'MinutesAgo'    => Carbon::now()->diffForHumans($this->created_at),  
            'SummeryDetail' => SummeryDetail::collection($this->orderproducts)     
        ];
    }
}
