<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PetService
{
    public function __construct()
    {}

    public function  addPet(array $pet)
    {
        $payload = [
            'id' => 0,
            'category' => [
                'id' => 0,
                'name' => $pet['category'],
            ],
            'name' => $pet['name'],
            'photoUrls' => [$pet['photo']],
            'tags' => [
                [
                    'id' => 0,
                    'name' => $pet['tag'],
                ],
            ],
            'status' => $pet['status'],
        ];

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://petstore.swagger.io/v2/pet', $payload)->json();

        if (isset($response['code']) && $response['code'] !== 200) {
            throw new Exception('Failed to add pet.');
        }
        return $response['name'];
    }

    public function uploadImage($imageData)
    {
        $payload = [
            'petId' => $imageData['id'],
            'additionalMetadata' => $imageData['additional'],
            'file' => $imageData['photo'],
        ];

        $response = Http::attach('file', $imageData['photo'], $imageData['photo']->getClientOriginalName())
            ->post("https://petstore.swagger.io/v2/pet/{$imageData['id']}/uploadImage", $payload);

        if ($response->status() !== 200) {
            throw new Exception('Failed upload Image.');
        }
    }

    public function findByStatus(array $status)
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus', [
            'status' => implode(',', $status),
        ]);

        $data = json_decode($response->body(), true);

        if ($response->status() !== 200 || json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Failed find');
        }
        return $data;
    }

    public function show(string $id)
    {
        $response = Http::get("https://petstore.swagger.io/v2/pet/{$id}");

        $data = json_decode($response->body(), true);

        if($response->status() !== 200 || json_last_error() !== JSON_ERROR_NONE){
            throw new Exception('Failed find');
        }

        return $data;
    }

    public function editPet(array $pet, string $id)
    {
        $payload = [
            'id' => $pet['id'],
            'category' => [
                'id' => 0,
                'name' => $pet['category'],
            ],
            'name' => $pet['name'],
            'photoUrls' => [$pet['photo']],
            'tags' => [
                [
                    'id' => 0,
                    'name' => $pet['tag'],
                ],
            ],
            'status' => $pet['status'],
        ];

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->put("https://petstore.swagger.io/v2/pet", $payload)->json();

        if (isset($response['code']) && $response['code'] !== 200) {
            throw new Exception('Failed to edit pet.');
        }
        return $response['name'];
    }

    public function postPet($pet)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded', // Ustaw odpowiedni Content-Type
        ])->post("https://petstore.swagger.io/v2/pet/{$pet['id']}?name={$pet['name']}&status={$pet['status']}");

        if (isset($response['code']) && $response['code'] !== 200) {
            throw new Exception('Failed to update pet.');
        }
    }

    public function delete(string $id)
    {
        $apiKey = 'special-key';
        $petId = intval($id);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->delete("https://petstore.swagger.io/v2/pet/{$petId}");

        if (isset($response['code']) && $response['code'] !== 200) {
            throw new Exception('Failed to delete pet.');
        }
        return response('Pet with ID ' . $petId . ' has been deleted.');
    }

}
