<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $data['absen'] = Attendance::join('users', 'attendances.id_asisten', 'users.id')
                              ->join('clas', 'attendances.id_kelas', 'clas.id')
                              ->join('materials', 'attendances.id_materi', 'materials.id')
                              ->join('code', 'attendances.id_code', 'code.id')
                              ->where('users.id', Auth::id())
                              ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'clas.nama_kelas', 'materials.materi', 'attendances.*')
                              ->orderBy('attendances.created_at', 'DESC')
                              ->get();
        return view('backend.report.riwayat', $data);
    }

    public function report()
    {
        $data['absen'] = Attendance::join('users', 'attendances.id_asisten', 'users.id')
                              ->join('clas', 'attendances.id_kelas', 'clas.id')
                              ->join('materials', 'attendances.id_materi', 'materials.id')
                              ->join('code', 'attendances.id_code', 'code.id')
                              ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'clas.nama_kelas', 'materials.materi', 'attendances.*')
                              ->orderBy('attendances.created_at', 'DESC')
                              ->get();
        return view('backend.report.report', $data);
    }

    public function search(Request $request)
    {
        $data['absen'] = Attendance::join('users', 'attendances.id_asisten', 'users.id')
                            ->join('clas', 'attendances.id_kelas', 'clas.id')
                            ->join('materials', 'attendances.id_materi', 'materials.id')
                            ->join('code', 'attendances.id_code', 'code.id')
                            ->where('attendances.date', '>=', $request->start)
                            ->where('attendances.date', '<=', $request->end)
                            ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'clas.nama_kelas', 'materials.materi', 'attendances.*')
                            ->orderBy('attendances.created_at', 'DESC')
                            ->get();
        return view('backend.report.report', $data);
    }

}
