<?php

namespace App\Http\Controllers;

use Validator;
use App\DaftarSiswa;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\DataTables;

class DaftarSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json()
    {
        return Datatables::of(DaftarSiswa::all())->make(true);
    }
    public function index()
    {
        return view('tabeldata.contoh');
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
    public function tabeljumlah()
    {
        $tabeljumlah = DaftarSiswa::all();
        return Datatables::of($tabeljumlah)
        ->addColumn('jumlah',function($bebas){
            return ($bebas->nilai1+$bebas->nilai2)/2;
        })
        ->addColumn('keterangan',function($ket){
            $hasil = ($ket->nilai1+$ket->nilai2)/2;
            return $ket->Nama_Siswa.', nilai yang anda peroleh adalah '.$hasil;
        })
        ->rawColumns(['jumlah','keterangan'])
        ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validation = Validator::make($request->all(), [
            'Nama_Siswa' => 'required|unique:daftar_siswas,Nama_Siswa',
            'Kelas'  => 'required',
            'Jurusan' => 'required',
            'nilai1' => 'required|numeric|max:100',
            'nilai2' => 'required|numeric|max:100'
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new DaftarSiswa([
                    'Nama_Siswa'    =>  $request->get('Nama_Siswa'),
                    'Kelas'     =>  $request->get('Kelas'),
                    'Jurusan' => $request->get('Jurusan'),
                    'nilai1' => $request->get('nilai1'),
                    'nilai2' => $request->get('nilai2')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DaftarSiswa  $daftarSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarSiswa $daftarSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarSiswa  $daftarSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarSiswa $daftarSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarSiswa  $daftarSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarSiswa $daftarSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarSiswa  $daftarSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarSiswa $daftarSiswa)
    {
        //
    }
}
