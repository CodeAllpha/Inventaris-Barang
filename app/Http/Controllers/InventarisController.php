<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Inventaris;
use App\Models\Petugas;
use App\Models\Jenis;
use Carbon\Carbon;
use App\Models\Ruang;
use App\Http\Requests\InventarisRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index(Request $request)
{
    $jenis = Jenis::all();
    $petugas = Petugas::all();
    $ruang = Ruang::all();
    
    $inventaris = Inventaris::with(['Jenis','Ruang','Petugas'])->get();

    if($request->has('search')) {

        $inventaris = Inventaris::where('nama','LIKE','%' .$request->search.'%')
                ->orWhere('kode_inventaris','LIKE','%' .$request->search.'%')
                ->paginate(10);
    }else{
        $inventaris = Inventaris::paginate(10);
    }

    return view('pages.inventaris.index', [
        'inventaris' => $inventaris,
        'jenis' => $jenis,
        'petugas' => $petugas,
        'ruang' => $ruang

    ]);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    // $inventaris = Inventaris::all();
    // $jenis = Jenis::all();

    // return view('pages.inventaris.create',[

    //     'petugas' => $inventaris,
    //     'jenis' => $jenis
    // ]);
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        'nama' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'kondisi' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'keterangan' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'jumlah' => 'required|integer|min:1|max:100',
        'kode_inventaris' => 'required|min:5|max:5|unique:inventaris',
        'tanggal_register' => 'required|date',
        'photo_barang' => 'required|image',
        'id_jenis' => 'required|integer|exists:jenis,id',
        'id_ruang' => 'required|integer|exists:ruang,id',
        'id_petugas' => 'required|integer|exists:petugas,id',
    ]);


    if ($validator->fails()) {
        return redirect()->route('pages.inventaris.index')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('status','create');
    }

    $inventaris = $request->all();

    $inventaris = new Inventaris();
    $inventaris->nama = $request->nama;
    $inventaris->kondisi = $request->kondisi;
    $inventaris->keterangan = $request->keterangan;
    $inventaris->jumlah = $request->jumlah;
    $inventaris->kode_inventaris = $request->kode_inventaris;
    $inventaris->tanggal_register = $request->tanggal_register;
    $inventaris->id_jenis = $request->id_jenis;
    $inventaris->id_ruang = $request->id_ruang;
    $inventaris->id_petugas = $request->id_petugas;
    
    $inventaris['photo_barang'] = $request->file('photo_barang')->store(
        'assets/gallery', 'public'
    );

    $inventaris->save();

    return redirect()->route('pages.inventaris.index')->with('toast_success', 'Barang Berhasil Di Tambahkan!');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $inventaris = Inventaris::findorFail($id);

    return view('pages.inventaris.show')->with([
        'inventaris' => $inventaris
    ]);
}

public function photo($id)
{
    $inventaris = Inventaris::findorFail($id);

    return view('pages.inventaris.photo')->with([
        'inventaris' => $inventaris
    ]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    
    $jenis = Jenis::all();
    $petugas = Petugas::all();
    $ruang = Ruang::all();

    $inventaris = Inventaris::findorFail($id);

    return view('pages.inventaris.update')->with([
        'inventaris' => $inventaris,
        'jenis' => $jenis,
        'petugas' => $petugas,
        'ruang' => $ruang
    ]);
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


    $jenis = Jenis::all();
    $petugas = Petugas::all();
    $ruang = Ruang::all();
    
    $inventaris = Inventaris::with(['Jenis','Ruang','Petugas'])->get();

    $validator = Validator::make($request->all(), [
        'nama' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'kondisi' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'keterangan' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
        'jumlah' => 'required|integer|min:1|max:100',
        'kode_inventaris' => "required|min:5|max:5|unique:inventaris,kode_inventaris,$id",
        'tanggal_register' => 'required|date',
        'photo_barang' => 'required|image|file',
        'id_jenis' => 'required|integer|exists:jenis,id',
        'id_ruang' => 'required|integer|exists:ruang,id',
        'id_petugas' => 'required|integer|exists:petugas,id',
    ]);


    if ($validator->fails()) {
        return redirect()->route('pages.inventaris.index',['id'=>$id])
                    ->withErrors($validator)
                    ->withInput()
                    ->with('status','edit');
    }

    $data = $request->all();

    $data['photo_barang'] = $request->file('photo_barang')->store(
        'assets/gallery', 'public'
    );

    // if($request->file('photo_barang')) {
    //     $validateData['photo_barang'] = $request->file('photo_barang')->store(
    //         'assets/gallery','publix'
    //     );
    // }

    $inventaris = Inventaris::findOrfail($id);
    $inventaris->update($data);
    
    // return redirect()->route('pages.inventaris.index'
    //     ,['ruang' => $ruang]);

    return redirect()->route('pages.inventaris.index')->with([
        'inventaris' => $inventaris,
        'jenis' => $jenis,
        'petugas' => $petugas,
        'ruang' => $ruang
    ])->with('toast_success', 'Barang Berhasil Di Update!');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $inventaris = Inventaris::findOrFail($id);

    $inventaris->delete();

    Inventaris::where('id', $id)->delete();

    return redirect()->route('pages.inventaris.index')->with('toast_success', 'Barang Berhasil Di Hapus!');
}
}
