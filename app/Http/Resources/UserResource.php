<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use SebastianBergmann\Type\NullType;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'name' => $this->name,
            'email' => $this->email,
            'auth_token' => $this->createToken('Make in India !@#')->plainTextToken,
            'role_id' => $this->role_id,
            'role_name' => $this->role->name,
            'products' => $this->products->pluck('name'),
            $this->mergeWhen($this->coordinator->cordinator_user_id ?? null, [
                'co_id' => $this->coordinator->cordinator_user_id ?? null,
                'co_name' => $this->find($this->coordinator->cordinator_user_id ?? null)->name ?? null
            ])
        ];
    }
}
