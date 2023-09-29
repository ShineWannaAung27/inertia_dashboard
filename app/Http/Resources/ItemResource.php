<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->name,
            'itemcode' => $this->itemcode,
            'description' => $this->description,
            'price' => $this->price,
            'kyat' => $this->kyat,
            'pae' => $this->pae,
            'yway' => $this->yway,
            'image' => $this->image,
        ];
    }
}
