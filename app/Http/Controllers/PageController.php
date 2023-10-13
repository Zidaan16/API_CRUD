<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PageController extends Controller
{
    public function homepage(){
        $client = new Client();
        $url = "http://192.168.100.138:8000/api/products";
        $response = $client->request('GET', $url)->getBody()->getContents();
        $response = json_decode($response, true);
        return view('index', ['contents' => $response]);
    }
    public function update(String $id){
        $client = new Client();
        $url = "http://192.168.100.138:8000/api/products/$id";
        $response = $client->request('GET', $url)->getBody()->getContents();
        $response = json_decode($response, true);
        return view('update', ['contents' => $response]);
    }
    public function store(Request $request){
        $url = "http://192.168.100.138:8000/api/products";
        $param = [
            'name' => $request->nama,
            'description' => $request->deskripsi,
            'price' => $request->harga,
            'status' => $request->status
        ];
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($param)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        return redirect()->to('/');
    }
    public function search(Request $request){
        $value = $request->query('val');
        $url = "http://192.168.100.138:8000/api/products/search/$value";
        $client = new Client();
        $response = $client->request('GET', $url)->getBody()->getContents();
        $response = json_decode($response, true);
        return view('index', ['contents' => $response]);
    }
    public function destroy(String $id){
        $url = "http://192.168.100.138:8000/api/products/$id";
        $client = new Client();
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        return redirect()->to('/');
    }
}
