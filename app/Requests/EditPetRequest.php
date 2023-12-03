<?php

namespace App\Requests;

class EditPetRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int',
            'name' => 'required|string',
            'category' => 'nullable|string',
            'photo' => 'required|string',
            'tag' => 'nullable|string',
            'status' => 'nullable|in:available,pending,sold',
        ];
    }
}
