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
        // if (auth()->user()->can('pengiriman')) {
        //     return view('admin.tipe_pengiriman.index', compact('pengiriman'));
        // }
            return view('admin.tipe_pengiriman.index', compact('pengiriman'));
        
       

    }

    public function create()
    {
        return view('admin.tipe_pengiriman.create');
    }

    public function destroy(Cluster $request)
    {

        $request->delete();
        return redirect()->route('admin.pengiriman.index')->with('success', 'pengipengiriman deleted successfully.');
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


    public function edit(Request $request, Cluster $pengiriman)
    {
        return view('admin.tipe_pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_cluster' => 'required',
        ]);


        $request->update([
            'name' => $request->nama_cluster,
        ]);

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman updated successfully.');
    }

}
