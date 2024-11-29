<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\DataDriver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $data = DataDriver::all();
        return view('driver.index', ['nama' => $data]);
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16|unique:data_drivers,nik',
            'foto' => 'required|image|max:2024',
            'nama' => 'required',
            'email' => 'required|email|unique:data_drivers,email',
            'phone' => 'required|unique:data_drivers,phone'
        ], [
            'image' => ':attribute harus berupa gambar.',
            'max' => ':attribute maksimal berukuran 2MB.'
        ]);

        $data = DataDriver::create($request->all());

        if ($request->hasFile('foto')) {
            // $request->file('foto')->move('foto', $request->file('foto')->getClientOriginalName());
            $uniq = uniqid();
            $request->file('foto')->move('foto', date('mdY') . $uniq . $request->file('foto')->getClientOriginalName());
            $data->foto = date('mdY') . $uniq . $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('data.driver')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = DataDriver::find($id);
        // return dd($data);
        return view('driver.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|min:16|max:18|unique:data_drivers,nik,' . $id,
            'foto' => 'nullable|image|max:2024',
            'nama' => 'required',
            'email' => 'required|email|unique:data_drivers,email,' . $id,
            'phone' => 'required|unique:data_drivers,phone,' . $id
        ], [
            'image' => ':attribute harus berupa gambar.',
        ]);

        // Cari data berdasarkan ID
        $data = DataDriver::findOrFail($id);

        // Update data
        $data->update($request->except(['foto'])); // Kecuali foto

        // Update foto jika ada file yang di-upload
        if ($request->hasFile('foto')) {
            // Simpan file baru
            $uniq = uniqid();
            $fileName = date('mdY') . $uniq . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto', $fileName);

            // Update nama file ke database
            $data->foto = $fileName;
            $data->save();
        }
        return redirect()->route('data.driver')->with('success', 'Data Berhasil Diedit');
    }

    public function view($id){
        $data = DataDriver::find($id);
        return view('driver.view', compact('data'));
    }

    public function delete($id)
    {
        DataDriver::find($id)->delete();
        return redirect()->route('data.driver')->with('success', 'Data Berhasil Dihapus');
    }
}
