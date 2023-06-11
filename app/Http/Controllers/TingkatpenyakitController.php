<?php

namespace App\Http\Controllers;

use App\Models\Tingkatpenyakit;
use App\Http\Requests\StoreTingkatpenyakitRequest;
use App\Http\Requests\UpdateTingkatpenyakitRequest;

class TingkatpenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penyakit.penyakit', [
            'penyakit' => Tingkatpenyakit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTingkatpenyakitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatpenyakitRequest $request)
    {
        $valid = $request->validate([
            'kode_penyakit' => 'required|unique:tingkat_penyakit,kode_penyakit',
            'penyakit' => 'required'
        ]);
        Tingkatpenyakit::create($valid);
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar penyakit telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tingkatpenyakit  $tingkatpenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Tingkatpenyakit $tingkatpenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tingkatpenyakit  $tingkatpenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkatpenyakit $tingkatpenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatpenyakitRequest  $request
     * @param  \App\Models\Tingkatpenyakit  $tingkatpenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatpenyakitRequest $request, $tingkatpenyakit)
    {
        $valid = $request->validate([
            'penyakit' => 'required'
        ]);
        $status = Tingkatpenyakit::find($tingkatpenyakit)->update($valid);
        if ($status) {
            return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Daftar penyakit telah diupdate</div>');
        }
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Daftar penyakit gagal diupdate</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tingkatpenyakit  $tingkatpenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($tingkatpenyakit)
    {
        // dd($tingkatpenyakit);
        Tingkatpenyakit::find($tingkatpenyakit)->delete();
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar penyakit telah dihapus
        </div>');
    }
}
