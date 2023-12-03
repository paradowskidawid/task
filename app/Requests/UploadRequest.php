<?php

namespace App\Requests;

class UploadRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int',
            'additional' => 'nullable|string',
            'photo' => 'nullable|image',
        ];
    }
}
