<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Excel;
use App\Siswa;
use PDF;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::all();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $check = Siswa::create($data);
        if (!$check) {
            $arr = array('msg' => 'Gagal simpan dengan Ajax', 'status' => false);
        } else {
            $arr = array('msg' => 'Sukses simpan dengan Ajax', 'status' => true);
        }
        return Response()->json($arr);
    }
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
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
        $data_siswa = Siswa::all();
        $pdf = PDF::loadView('siswa.pdf', ['data_siswa' => $data_siswa]);
        // gunanya untuk tidak mendownload
        // return $pdf->download('laporan_data_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
        return $pdf->stream();

    }
}
