<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Imports\BarangImport;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'barangs' => Barang::all()
        ]);
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');

        $import = new BarangImport;
        $import->import($file);


        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return redirect('/')->with('success', 'Data berhasil di Import');
    }

    public function export()
    {
        return (new BarangExport)->download('data_barang.xlsx');
    }
}
