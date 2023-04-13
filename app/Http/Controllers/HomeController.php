<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function store(HomeRequest $req)
    {
        $data = $req->validated();
        $response = Http::post('https://insw-dev.ilcs.co.id/n/simpan', [
            $data
        ]);
        if ($response->successful()) {
            return back()->withSuccess('Data berhasil dikirim');
        } else {
            return back()->withError('Data gagal dikirim');
        }
    }

    public function getCountries(Request $req)
    {
        $response = Http::get('https://insw-dev.ilcs.co.id/n/negara', [
            'ur_negara' => strtoupper($req->query('ur_negara')),
        ]);
        $data = [];
        foreach ($response->json('data', []) as $i => $item) {
            $data[$i] = [
                'label' => $item['ur_negara'],
                'value' => $item['kd_negara']
            ];
        }

        return response()->json($data);
    }

    public function getHarbor(Request $req)
    {
        $response = Http::get('https://insw-dev.ilcs.co.id/n/pelabuhan', [
            'kd_negara' => strtoupper($req->query('kd_negara')),
        ]);
        $data = [];
        foreach ($response->json('data', []) as $i => $item) {
            $data[$i] = [
                'label' => $item['ur_pelabuhan'],
                'value' => $item['kd_pelabuhan']
            ];
        }

        return response()->json($data);
    }

    public function getBarang(Request $req)
    {
        $response = Http::get('https://insw-dev.ilcs.co.id/n/barang', [
            'hs_code' => $req->query('hs_code'),
        ]);
        $data = $response->json('data', []);

        return response()->json($data[0]);
    }

    public function getTarif(Request $req)
    {
        $response = Http::get('https://insw-dev.ilcs.co.id/n/tarif', [
            'hs_code' => $req->query('hs_code'),
        ]);
        $data = $response->json('data', []);

        return response()->json($data[0]);
    }
}
