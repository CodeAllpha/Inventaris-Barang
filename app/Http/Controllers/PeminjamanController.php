<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeminjamanRequest;
use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\Petugas;
use App\Models\Pegawai;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pegawai = Pegawai::all();
        $petugas = Petugas::all();
        $inventaris = Inventaris::all();

        $peminjaman = Peminjaman::with(['Pegawai','Inventaris','Petugas'])->get();

        return view('pages.peminjaman.index',[
            'peminjaman' => $peminjaman,
            'pegawai' => $pegawai,
            'petugas' => $petugas,
            'inventaris' => $inventaris,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {   


        



        
        
        // $cek = \DB::table('inventaris')->where('id',$id)->where('jumlah','>',0)->count();
        //     if($cek > 0) {

        //         \DB::table('peminjaman')->insert([
        //             'nama_barang'=> $id,
        //             'peminjam' => \Auth::user()->username,
        //             'status_peminjaman' => 'PENDING',
        //             'tanggal_pinjam' => Carbon::now()->addYears(5),
        //             // 'tanggal_kembali' => date('Y-m-d'),
        //         ]);
              
        // $inventaris = \DB::table('inventaris')->where('id',$id)->first();
        // $stok_now = $inventaris->jumlah;
        // $stok_new = $stok_now - 1;
            
        
        // \DB::table('inventaris')->where('id',$id)->update([      
        //     'jumlah'=>$stok_new
        // ]);
        //         return redirect()->route('pages.peminjaman.index');
        //     }else{
               
        //         return redirect()->route('pages.peminjaman.index');
        //     }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // public function photo($id)
    // {
    //     $inventaris = Inventaris::findorFail($id);

    //     return view('pages.peminjaman.photo')->with([
    //         'inventaris' => $inventaris
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
