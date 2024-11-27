<?php

namespace App\Http\Controllers;

use App\Models\AlamatCluster;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class TipePengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Cluster::all();
         return view('admin.tipe_pengiriman.index', compact('pengiriman'));
        
       

    }

    public function create()
    {
        return view('admin.tipe_pengiriman.create');
    }

    public function destroy(Cluster $pengirimans)
    {
        if ($pengirimans->delete()) {
            return redirect()->route('admin.pengiriman.index')->with('success', 'Data deleted successfully.');
        }
        return redirect()->route('admin.pengiriman.index')->with('error', 'Failed to delete data.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);


        Cluster::create([
            'nama_cluster' => $request->name,
        ]);

        return redirect()->route('admin.pengiriman.index')->with('success', 'Tipe Pengiriman created successfully.');
    }


    public function edit(Cluster $pengirimans)
    {
        return view('admin.tipe_pengiriman.edit', compact('pengirimans'));
    }


    public function update(Request $request, Cluster $pengirimans)
    {
        $request->validate([
            'nama_cluster' => 'required|string|max:255',
        ]);

       
        $pengirimans->update([
            'nama_cluster' => $request->nama_cluster,
        ]);

        return redirect()->route('admin.pengiriman.index')->with('success', 'Data updated successfully.');
    }
}
