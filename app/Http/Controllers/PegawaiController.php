<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;
use App\Http\Requests\PegawaiRequest;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {

            $pegawai = Pegawai::where('nama_pegawai','LIKE','%' .$request->search.'%')
                    ->orWhere('username','LIKE','%' .$request->search.'%')
                    ->paginate(10);
        }else{
            $pegawai = Pegawai::paginate(10);
        }

        return view('pages.pegawai.index', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pegawai.create');
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
            'nama_pegawai' => 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'username' => 'required|string|max:40|unique:pegawais',
            'password'=> 'required|min:3|confirmed',
            'nip' => 'required|integer|max:40|unique:pegawais',
            'alamat' => 'required|string|max:150',
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.pegawai.index')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','create');
        }

        $pegawai = $request->all();
        
        $pegawai = new Pegawai();
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->username = $request->username;
        $pegawai->nip = $request->nip;
        $pegawai->alamat = $request->alamat;
        $pegawai->password = bcrypt($request->password);
        $pegawai->save();

        return redirect()->route('pages.pegawai.index')->with('toast_success', 'Pegawai Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findorFail($id);

        return view('pages.pegawai.show')->with([
            'pegawai' => $pegawai
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
        $pegawai = Pegawai::findorFail($id);

        return view('pages.pegawai.update')->with([
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama_pegawai' => 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'username' => 'required|string|max:40|unique:pegawais,username'.$pegawai->id,
            'password'=> 'required|min:3|confirmed',
            'nip' => 'required|integer|max:40|unique:pegawais,nip'.$pegawai->id,
            'alamat' => 'required|string|max:150',
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.pegawai.index',['id'=>$id])
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','edit');
        }


        $data = $request->all();
        $pegawai = Pegawai::findOrfail($id);

        $pegawai->update($data);

        return redirect()->route('pages.pegawai.index')->with('toast_success', 'Pegawai Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->delete();

        Pegawai::where('id', $id)->delete();

        return redirect()->route('pages.pegawai.index')->with('toast_success', 'Pegawai Berhasil Di Hapus!');
    }

     
}
