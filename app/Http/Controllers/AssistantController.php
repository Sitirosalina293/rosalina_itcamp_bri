<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\User;
use App\Models\Assistant;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asisten'] = Assistant::orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('backend.data.asisten.index', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hashed = Hash::make($request->password1);
        $password2 = $request->password2;
        if(Hash::check($request->password2, $hashed)){
            $store = new Assistant();
            $store->id_asisten = $request->id_asisten;
            $store->name = $request->name;
            $store->join_date = $request->join_date;
            $store->role = $request->role;
            $store->email = $request->email;
            $store->password = $hashed;
            
            $photo = $request->photo;
            $namafile = $photo->getClientOriginalName();
            $photo->move('photo', $namafile);
            $store->photo = $namafile;
            $store->save();
            if(!$store){
                $Response = ['error' => "Data Error"];
            } else {
                $Response = ['success' => "Asisten Data Has Been Saved"]; 
            }

        } else {
            $Response = ['errror' => "Password Not Same"];
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
        $edit = Assistant::findOrFail($request->id);
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
        if($request->password1) {
            $hashed = Hash::make($request->password1);
            $password2 = $request->password2;
            if(Hash::check($request->password2, $hashed)){
                $update = Assistant::findOrFail($request->id);
                $update->id_asisten = $request->id_asisten;
                $update->name = $request->name;
                $update->join_date = $request->join_date;
                if($update->role == "Asisten" || $update->role == "PJ") {
                    $update->role = $request->role2;
                } else {
                    $update->role = $request->role;
                }
                
                $update->email = $request->email;
                $update->password = $hashed;
                
                if($request->hasFile('photo')) {
                    $path = 'photo/'.$update->photo;
                    if(File::exists($path)){
                        File::delete($path);
                    }
                    $photo = $request->photo;
                    $namafile = $photo->getClientOriginalName();
                    $photo->move('photo', $namafile);
                    $update->photo = $namafile;
                }
                $update->save();
                if(!$update){
                    $Response = ['error' => "Data Error"];
                } else {
                    $Response = ['success' => "Asisten Data Has Been Updated"]; 
                }

            } else {
                $Response = ['errror' => "Password Not Same"];
            }
    } else {
                $update = Assistant::findOrFail($request->id);
                $update->id_asisten = $request->id_asisten;
                $update->name = $request->name;
                $update->join_date = $request->join_date;
                if($update->role == "Asisten" || $update->role == "PJ") {
                    $update->role = $request->role2;
                } else {
                    $update->role = $request->role;
                }
                $update->email = $request->email;

                        if($request->hasFile('photo')) {
                            $path = 'photo/'.$update->photo;
                            if(File::exists($path)){
                                File::delete($path);
                            }
                            $photo = $request->photo;
                            $namafile = $photo->getClientOriginalName();
                            $photo->move('photo', $namafile);
                            $update->photo = $namafile;
                        }
                $update->save();
                    if(!$update){
                        $Response = ['error' => "Data Error"];
                    } else {
                        $Response = ['success' => "Asisten Data Has Been Updated"]; 
                    }

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
        $destroy = Assistant::findOrFail($id);
            $path = 'photo/'.$destroy->photo;
            if(File::Exists($path)){
                File::Delete($path);
            }
        $destroy->delete();

        return redirect()->back();
    }

    public function editProfile($id)
    {
        $data['profile'] = Assistant::findOrFail($id);

        return view('backend.profile', $data);
    }
}
