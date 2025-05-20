<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'https://appmonev.lamptkes.org/GetUser';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);
            foreach ($dt as $k) {
                echo $k['name'] . '<br>';
            }
        }


        curl_close($ch);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $url = 'https://appmonev.lamptkes.org/GetIsi';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);
            // foreach ($dt as $k) {
            //     echo $k['name'] . '<br>';
            // }
            return $dt;
        }


        curl_close($ch);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $url = 'https://appmonev.lamptkes.org/GetKeu';
        // $apiKey = 'your_api_key_here';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tambahkan API key di header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // 'Authorization: Bearer ' . $apiKey,
            'Authorization: Bearer ',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            // echo 'Responsess: ' . $response;
            $dt = json_decode($response, true);
            // foreach ($dt as $k) {
            //     echo $k['name'] . '<br>';
            // }
            return $dt;
        }


        curl_close($ch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
