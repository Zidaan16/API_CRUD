<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UpdateProduct extends Controller
{
    public function index(Request $request)
    {   
        $client = new Client();
        $params = [
            'name' => $request->input('nama'),
            'description' => $request->input('deskripsi'),
            'price' => $request->input('harga'),
            'status' => $request->input('status')
        ];
        $url = "http://192.168.100.138:8000/api/products/".$request->input('id');
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($params)
        ]);
        return redirect()->to('/');
    }
}
