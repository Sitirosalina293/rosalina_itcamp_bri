<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idLogin = Auth::id();
        $getIdAsisten = $request->id_asisten;
        $getKode = $request->kode;
        $getIdMateri = $request->materi;
        $getIdKelas = $request->kelas;
        $getPeran = $request->peran_jaga;

        //check id asisten
        $getMatchId = User::where('id_asisten', $getIdAsisten)->first();
        if($idLogin == $getMatchId->id){
            //check kode
            $getMatchKode = Code::where('code', $getKode)->first();
            if($getKode == $getMatchKode->code && (empty($getMatchKode->id_user_get))){
                    //check kode absen tidak sama dengan yg dibuat sendiri
                    if($getMatchKode->id_user != $idLogin){
                        $store = new Attendance;
                        $store->id_kelas = $getIdKelas;
                        $store->id_materi = $getIdMateri;
                        $store->id_asisten = $idLogin;
                        $store->teaching_role = $getPeran;

                        $today = Carbon::now("GMT+7")->toDateString();
                        $timeNow = Carbon::now("GMT+7")->toTimeString();

                        $store->date = $today;
                        $store->start = $timeNow;
                        $store->id_code = $getMatchKode->id;
                        $store->save();

                        $getMatchKode->id_user_get = $idLogin;
                        $getMatchKode->save();
                        if(!$store){
                            $Response = ['error' => "Absen error"];
                        } else {
                            $Response = ['success' => "Absen Success"];
                        }

                    } else {
                        $Response = ['error' => "Absen error"];
                    }
            } else {
                $Response = ['error' => "Absen error"];
            }
        } else {
            $Response = ['error' => "Absen error"];
        }

        return response()->json($Response, 200);
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
        $carbon = Carbon::now('GMT+7');
        $today = $carbon->toDateString();
        $idLogin = Auth::id();
        $cekAbsen = Attendance::where('id_asisten', $idLogin)->where('date', $today)->where('end', null)->first();

        $masuk = $cekAbsen->start;
        $keluar = Carbon::now("GMT+7")->toTimeString();
        $cekAbsen->end = $keluar;
        $hasil = $carbon->diffInMinutes($masuk);
        $cekAbsen->duration = $hasil;
        $cekAbsen->save();

        if(!$cekAbsen){
            $Response = ['error' => "Error Saat simpan clockout"];
        } else {
            $Response = ['success' => "Berhasil Clockout"];
        }

        return response()->json($Response, 200);
    }
}
