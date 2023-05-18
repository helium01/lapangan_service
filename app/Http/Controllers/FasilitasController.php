<?php

namespace App\Http\Controllers;

use App\Models\fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return response()->json($fasilitas);
    }

    public function show($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return response()->json($fasilitas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_lapangan' => 'required|exists:lapangans,id',
            'fasilitas1' => 'nullable|string',
            'fasilitas2' => 'nullable|string',
            'fasilitas3' => 'nullable|string',
            'fasilitas4' => 'nullable|string',
            'fasilitas5' => 'nullable|string',
            'fasilitas6' => 'nullable|string',
            'fasilitas7' => 'nullable|string',
            'fasilitas8' => 'nullable|string',
            'fasilitas9' => 'nullable|string',
            'fasilitas10' => 'nullable|string',
        ]);

        $fasilitas = Fasilitas::create($validatedData);
        return response()->json($fasilitas, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_lapangan' => 'required|exists:lapangans,id',
            'fasilitas1' => 'nullable|string',
            'fasilitas2' => 'nullable|string',
            'fasilitas3' => 'nullable|string',
            'fasilitas4' => 'nullable|string',
            'fasilitas5' => 'nullable|string',
            'fasilitas6' => 'nullable|string',
            'fasilitas7' => 'nullable|string',
            'fasilitas8' => 'nullable|string',
            'fasilitas9' => 'nullable|string',
            'fasilitas10' => 'nullable|string',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update($validatedData);
        return response()->json($fasilitas, 200);
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        return response()->json(null, 204);
    }
}
