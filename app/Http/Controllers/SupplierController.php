<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function supplier(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if(strlen($katakunci)) {
            $supplier = Supplier::where('nama', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else {
            $supplier = Supplier::orderBy('kode', 'asc')->Paginate($jumlahbaris);
        }
        return view('supplier.supplier')->with('supplier', $supplier);
    }

    public function create() 
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:Supplier,kode',
            'nama' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
        ], [
            'kode.required'=>'Kode wajib diisi',
            'kode.unique'=>'Kode supplier sudah ada di dalam data',
            'nama.required'=>'Nama supplier wajib diisi',
            'nomor.required'=>'Nomor HP wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $supplier = [
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'nomor'=>$request->nomor,
            'alamat'=>$request->alamat,
        ];
        Supplier::create($supplier);
       return redirect()->to('supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = Supplier::where('kode', $id)->first();
        return view('supplier.edit')->with('supplier', $supplier);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required'=>'Nama supplier wajib diisi',
            'nomor.required'=>'Nomor HP wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $supplier = [
            'nama'=>$request->nama,
            'nomor'=>$request->nomor,
            'alamat'=>$request->alamat,
        ];
        Supplier::where('kode', $id)->update($supplier);
       return redirect()->to('supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Supplier::where('kode', $id)->delete();
        return redirect()->to('supplier')->with('success', 'Berhasil menghapus data supplier');
    }
}
