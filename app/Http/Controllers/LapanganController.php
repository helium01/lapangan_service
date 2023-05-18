<?php

namespace App\Http\Controllers;

use App\Models\lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::all();
        return response()->json($lapangans);
    }

    public function show($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return response()->json($lapangan);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lapangan' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi_lapangan' => 'required|string',
            'lang' => 'required|numeric',
            'long' => 'required|numeric',
        ]);

        $lapangan = Lapangan::create($validatedData);
        return response()->json($lapangan, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lapangan' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi_lapangan' => 'required|string',
            'lang' => 'required|numeric',
            'long' => 'required|numeric',
        ]);

        $lapangan = Lapangan::findOrFail($id);
        $lapangan->update($validatedData);
        return response()->json($lapangan, 200);
    }

    public function destroy($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $lapangan->delete();
        return response()->json(null, 204);
    }
    public function cari_lokasi(Request $request){
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius');

        $lapangans = Lapangan::select('id', 'nama_lapangan', 'alamat', 'deskripsi_lapangan', 'lang', 'long')
            ->selectRaw(
                "(6371 * acos(cos(radians($latitude)) * cos(radians(lang)) * cos(radians(`long`) - radians($longitude)) + sin(radians($latitude)) * sin(radians(lang)))) AS distance"
            )
            ->havingRaw("distance <= $radius")
            ->orderBy('distance')
            ->get();

        return response()->json($lapangans);
    }
}
