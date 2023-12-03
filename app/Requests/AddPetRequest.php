<?php

namespace App\Requests;

class AddPetRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category' => 'nullable|string',
            'photo' => 'required|string',
            'tag' => 'nullable|string',
            'status' => 'nullable|in:available,pending,sold',
        ];
    }
}
