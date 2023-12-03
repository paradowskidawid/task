<?php

namespace App\Requests;

class PostPetRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int',
            'name' => 'nullable|string',
            'status' => 'nullable|in:available,pending,sold',
        ];
    }
}
