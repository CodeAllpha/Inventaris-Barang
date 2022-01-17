<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Http\Requests\RuangRequest;
use Validator;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {

            $ruang = Ruang::where('nama_ruang','LIKE','%' .$request->search.'%')
                    ->orWhere('kode_ruang','LIKE','%' .$request->search.'%')
                    ->paginate(10);
        }else{
            $ruang = Ruang::paginate(10);
        }

        return view('pages.ruang.index', [
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
        return view('pages.ruang.create');
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
            'nama_ruang' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'kode_ruang' => 'required|string|min:5|max:5|unique:ruang',
            'keterangan'=> 'required|string|max:40'
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.ruang.index')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','create');
        }

        $ruang = $request->all();
        
        $ruang = new Ruang();
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kode_ruang = $request->kode_ruang;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();

        return redirect()->route('pages.ruang.index')->with('toast_success', 'Ruang Berhasil Di Tambahkan!');
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
        $ruang = Ruang::findorFail($id);

        return view('pages.ruang.update')->with([
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
    public function update(Request $request, Ruang $ruang, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'kode_ruang' => "required|string|min:5|max:5|unique:ruang,kode_ruang,$id",
            'keterangan'=> 'required|string|max:40'
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.ruang.index',['id'=>$id])
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','edit');
        }

        $data = $request->all();
        $ruang = Ruang::findOrfail($id);

        $ruang->update($data);

        return redirect()->route('pages.ruang.index')->with('toast_success', 'Ruang Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruang = Ruang::findOrFail($id);

        $ruang->delete();

        Ruang::where('id', $id)->delete();

        return redirect()->route('pages.ruang.index')->with('toast_success', 'Ruang Berhasil Di Hapus!');
    }
}
