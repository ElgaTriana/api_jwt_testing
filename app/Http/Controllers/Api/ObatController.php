<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Obat;
use App\Http\Resources\ObatResource;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->paginate(5);

        return new ObatResource(true, 'List Data Obat', $obats);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('obats', $image->hashName());

        $obat = Obat::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock,
        ]);

        return new ObatResource(true, 'Data Obat Berhasil Ditambahkan!', $obat);
    }

    public function show($id)
    {
        $obat = Obat::find($id);

        return new ObatResource(true, 'Detail Data Obat!', $obat);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $obat = Obat::find($id);

        if ($request->hasFile('image')) {

            Storage::delete('obats/' . basename($obat->image));

            $image = $request->file('image');
            $image->storeAs('obats', $image->hashName());

            $obat->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
            ]);

        } else {

            $obat->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
            ]);
        }

        return new ObatResource(true, 'Data Obat Berhasil Diubah!', $obat);
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        Storage::delete('obats/'.basename($obat->image));

        $obat->delete();

        return new ObatResource(true, 'Data Obat Berhasil Dihapus!', null);
    }
}
