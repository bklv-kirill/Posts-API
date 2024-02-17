<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $abilities = $this->is_admin ? ["create", "delete"] : ["create"];
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "token" => $this->createToken("token", $abilities, now()->addHour(24*7))->plainTextToken,
        ];
    }
}
