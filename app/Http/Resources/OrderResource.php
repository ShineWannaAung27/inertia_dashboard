<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'item_id' => $this->item_id,
            'customer_id' => $this->customer_id,
            'confirm_status' => $this->confirm_status,
            'confirm_price' => $this->confirm_price,
            'org_price' => $this->org_price,
            'remark' => $this->remark,
        ];
    }
}
