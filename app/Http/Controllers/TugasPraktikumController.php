<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class TugasPraktikumController extends Controller
{
    public function tugas_praktikum_2()
    {   
        /* Select */
        $select = Guru::select('nama_guru', 'nip', 'kelamin', 'alamat_guru', 'telpon_guru', 'username')->get();
        
        /* Select Like */
        //$select_like = 

        /* Select Join Jadwal*/
        $select_join = Jadwal::join('data_guru', 'data_guru.id_guru', '=', 'tbl_jadwal.id_guru')
                                ->join('setup_pelajaran', 'setup_pelajaran.id_pelajaran', '=', 'tbl_jadwal.id_pelajaran')
                                ->join('setup_kelas', 'setup_kelas.id_kelas', '=', 'tbl_jadwal.id_kelas')
                                ->limit(10)
                                ->get();
/*         dd($select, $select_join); */

        return view('tugas_praktikum', compact('select', 'select_join'));
    }
}
