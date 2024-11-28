<?php

namespace App\Http\Controllers;

use App\Models\AlamatCluster;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TipePengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Cluster::all();
        $nohp = AlamatCluster::all();
         return view('admin.tipe_pengiriman.index', compact('pengiriman','nohp'));
        
       

    }

    //1
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

    //2
    public function create2()
    {
        return view('admin.jasa_pengiriman.create');
    }

    public function destroy2(AlamatCluster $phonenumber)
    {
        if ($phonenumber->delete()) {
            return redirect()->route('admin.pengiriman.index')->with('success', 'Data deleted successfully.');
        }
        return redirect()->route('admin.pengiriman.index')->with('error', 'Failed to delete data.');
    }


    public function store2(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
        ]);
    
        AlamatCluster::create([
            'alamat' => $request->alamat,
            'cluster_id' => 3, // Default value
        ]);
    
        return redirect()->route('admin.pengiriman.index')->with('success', 'Nomor Jasa Pengiriman created successfully.');
    }
    


    public function edit2(AlamatCluster $phonenumber)
    {
        return view('admin.jasa_pengiriman.edit', compact('phonenumber'));
    }

 
    public function update2(Request $request, AlamatCluster $phonenumber)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
        ]);
    
        $phonenumber->update([
            'alamat' => $request->alamat,
            'cluster_id' => $request->input('cluster_id', 3), // Default value 
        ]);
    
        return redirect()->route('admin.pengiriman.index')->with('success', 'Data updated successfully.');
    }
    
}
