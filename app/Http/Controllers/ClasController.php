<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = Clas::orderBy('created_at', 'DESC')->get();
        return view('backend.data.kelas.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $store = Clas::create($data);
        if(!$store) {
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
        }
        return response()->json($Response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $edit = Clas::findOrFail($request->id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Clas::findOrFail($request->id);
        $update->jurusan = $request->jurusan;
        $update->fakultas = $request->fakultas;
        $update->tingkat = $request->tingkat;
        $update->nama_kelas = $request->nama_kelas;
        $update->save();
        if(!$update) {
            $Response = ['error' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
        }
        return response()->json($Response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Clas::findOrFail($id);
        $destroy->delete();

        return redirect()->back();
    }
}
