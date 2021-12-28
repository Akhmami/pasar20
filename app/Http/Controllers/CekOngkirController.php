<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Courier;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CekOngkirController extends Controller
{
    public function index(Request $request)
    {
        $dataKurir = Courier::pluck('name', 'code');
        $dataKota = City::with('province')->get();
        $ongkir = '';

        if (count($request->all()) > 0) {
            $request->validate([
                'origin' => 'required',
                'destination' => 'required',
                'weight' => 'required',
                'courier' => 'required'
            ]);

            $ongkir = RajaOngkir::ongkosKirim([
                'origin'        => $request->origin,
                'destination'   => $request->destination,
                'weight'        => $request->weight,
                'courier'       => $request->courier
            ])->get();

            // dd($ongkir);
        }

        return view('cek-ongkir', compact('dataKurir', 'dataKota', 'ongkir'));
    }
}
