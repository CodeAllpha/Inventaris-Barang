<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;
use App\Http\Requests\PetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {   

        if($request->has('search')) {

            $petugas = Petugas::where('nama_petugas','LIKE','%' .$request->search.'%')
                    ->orWhere('username','LIKE','%' .$request->search.'%')
                    ->paginate(10);
        }else{
            $petugas = Petugas::paginate(10);
        }

        return view('pages.petugas.index', [
            'petugas' => $petugas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('pages.petugas.create');
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
            'nama_petugas' => 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'username' => 'required|string|max:40|unique:petugas',
            'password'=> 'required|confirmed|min:3',
            'nomor_hp' => 'nullable|digits_between:11,13',
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.petugas.index')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','create');
        }


        $petugas = $request->all();
        
        $petugas = new Petugas();
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        $petugas->nomor_hp = $request->nomor_hp;
        $petugas->level = 'operator';
        $petugas->password = bcrypt($request->password);
        $petugas->save();

        return redirect()->route('pages.petugas.index')->with('toast_success', 'Petugas Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::findorFail($id);

        return view('pages.petugas.show')->with([
            'petugas' => $petugas
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
        $petugas = Petugas::findorFail($id);

        return view('pages.petugas.update')->with([
            'petugas' => $petugas
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
            'nama_petugas' => 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'username' => "required|string|max:40|unique:petugas,username,$id",
            'nomor_hp' => "nullable|digits_between:11,13,$id",
            'password'=> 'required|confirmed|min:3',
        ]);


        if ($validator->fails()) {
            return redirect()->route('pages.petugas.index',['id'=>$id])
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status','edit');
        }

        $data = $request->all();
        $petugas = Petugas::findOrfail($id);

        $petugas->update($data);

        return redirect()->route('pages.petugas.index')->with('toast_success', 'Petugas Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);

        $petugas->delete();

        Petugas::where('id', $id)->delete();

        return redirect()->route('pages.petugas.index')->with('toast_success', 'Petugas Berhasil Di Hapus!');
    }
}
