<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get data
        $barangs = Barang::latest()->paginate(5);

        dd($barangs);

        //render view with data barang
        return view('index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi Form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'description'   => 'required|min:10',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload Image
        $image = $request->file('image');
        $image->storeAs('public/barang', $image->hashName());

        // Membuat Data (Menyimpan)
        Barang::create([
            'name'     => $request->name,
            'description'   => $request->description,
            'image'     => $image->hashName(),
        ]);

        // response
        return redirect()->route('barang.index')->with(['success' => 'Data berhasil disimpan']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
