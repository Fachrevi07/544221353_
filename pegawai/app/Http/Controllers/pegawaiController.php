<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;

class pegawaiController extends Controller
{

    protected $pegawai;

    public function __construct(){ 
        $this->pegawai = new Pegawai();
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $response['Pegawai'] = $this->pegawai->all();
       return view('pages.index')->with($response);
    }



    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->pegawai->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['pegawai'] = $this->pegawai->find($id);
        return view('pages.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $pegawai = $this->pegawai->find($id);

        $pegawai->update(array_merge($pegawai->toArray(), $request->toArray()));
        return redirect ('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai =$this->pegawai->find($id);
        $pegawai->delete();
        return redirect('pegawai');
    }
}
