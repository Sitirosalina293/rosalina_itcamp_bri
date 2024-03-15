<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['materi'] = Material::orderBy('created_at', 'DESC')->get();
        return view('backend.data.materi.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Material::create($request->all());

        if(!$store){
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
            return redirect()->back();
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
        $edit = Material::findOrFail($request->id);
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
        $update = Material::findOrFail($request->id);
        $update->materi = $request->materi;
        $update->save();
        if(!$update){
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been updated"];
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
        $destroy = Material::findOrFail($id);
        $destroy->delete();
        return redirect()->back();
    }
}
