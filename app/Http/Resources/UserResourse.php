<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourse extends JsonResource
{
//    public static $wrap = 'user';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   /* public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }*/

    public function toArray(Request $request): array
    {
     return [
         'name' =>$this->name,
         'address'=>$this->address,
        'meta' => $this->when($this->address != null, fn()=>1, fn()=>2 )
     ];
    }
}
