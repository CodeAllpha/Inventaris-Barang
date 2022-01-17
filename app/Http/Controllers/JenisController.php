<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Http\Requests\JenisRequest;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {

            $jenis = Jenis::where('nama_jenis','LIKE','%' .$request->search.'%')
                    ->orWhere('kode_jenis','LIKE','%' .$request->search.'%')
                    ->paginate(10);
        }else{
            $jenis = Jenis::paginate(10);
        }

        return view('pages.jenis.index', [
            'jenis' => $jenis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jenis.create');
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
            'nama_jenis' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'kode_jenis' => 'required|string|min:5|max:5|unique:jenis',
            'keterangan'=> 'required|string|max:40'
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.jenis.index')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','create');
        }

        $jenis = $request->all();

        $jenis = new Jenis();
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kode_jenis = $request->kode_jenis;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();
        
        return redirect()->route('pages.jenis.index')->with('toast_success', 'Jenis Berhasil Di Tambahkan!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $jenis = Jenis::findorFail($id);

        return view('pages.jenis.update')->with([
            'petugas' => $jenis
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

        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'kode_jenis' => "required|string|min:5|max:5|unique:jenis,kode_jenis,$id",
            'keterangan'=> 'required|string|max:40'
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.jenis.index',['id'=>$id])
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','edit');
        }


        $data = $request->all();
        $jenis = Jenis::findOrfail($id);

        $jenis->update($data);

        return redirect()->route('pages.jenis.index')->with('toast_success', 'Jenis Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);

        $jenis->delete();

        Jenis::where('id', $id)->delete();

        return redirect()->route('pages.jenis.index')->with('toast_success', 'Jenis Berhasil Di Hapus!');
    }
}
