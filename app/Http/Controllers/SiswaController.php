<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Excel;
use App\Siswa;
use PDF;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::all();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);
        $check = Siswa::create($data);
        if (!$check) {
            $msg = 'Gagal simpan siswa baru';
        } else {
            $msg = 'Sukses simpan siswa baru';
        }
        return redirect('/siswa')->with('sukses', $msg);
    }
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]));
        if ($request->hasFile('foto')) {
            $fotoreq = rand() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads/foto/', $fotoreq);
            $siswa->foto = $fotoreq;
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil di-update.');
    }
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data berhasil di-delete.');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'DataSiswa.xlsx');
    }

    public function pdf()
    {
        $data_siswa = Siswa::all();
        return view('siswa.pdf', ['data_siswa' => $data_siswa]);
    }
    public function exportPdf()
    {
	    $items = Siswa::get();

	    $data = [
            'title' => 'Data Siswa',
            'items' => $items
	    ];

        $pdf = PDF::loadView('siswa.excel', $data);
        return $pdf->download('DataSiswa.pdf');

    }
    public function charts() {
        $orders = Siswa::select("jenis_kelamin", DB::raw('count(*) as total'))
                        ->groupBy('jenis_kelamin')->get();
        return view('siswa.chart',['orders' => $orders, 'count' => 7]); 
    }
}
