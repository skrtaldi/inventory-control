<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function customer(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if(strlen($katakunci)) {
            $customer = Customer::where('nama', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else {
            $customer = Customer::orderBy('kode', 'asc')->Paginate($jumlahbaris);
        }
        return view('customer.customer')->with('customer', $customer);
    }

    public function create() 
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:Customer,kode',
            'nama' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
        ], [
            'kode.required'=>'Kode wajib diisi',
            'kode.unique'=>'Kode sudah ada di dalam data',
            'nama.required'=>'Nama customer wajib diisi',
            'nomor.required'=>'Nomor HP wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $customer = [
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'nomor'=>$request->nomor,
            'alamat'=>$request->alamat,
        ];
        Customer::create($customer);
       return redirect()->to('customer')->with('success', 'Customer berhasil ditambahkan');
    }

    public function edit($id)
    {
        $customer = Customer::where('kode', $id)->first();
        return view('customer.edit')->with('customer', $customer);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required'=>'Nama Customer wajib diisi',
            'nomor.required'=>'Nomor wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $customer = [
            'nama'=>$request->nama,
            'nomor'=>$request->nomor,
            'alamat'=>$request->alamat,
        ];
        Customer::where('kode', $id)->update($customer);
       return redirect()->to('customer')->with('success', 'Berhasil melakukan update data customer');
    }

    public function destroy($id)
    {
        Customer::where('kode', $id)->delete();
        return redirect()->to('customer')->with('success', 'Berhasil menghapus data customer');
    }
}
