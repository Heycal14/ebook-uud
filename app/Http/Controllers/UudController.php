<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uud;

class UudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uud=Uud::all();
        return response()->json([
            'status' => 200,
            'data' => $uud
        ], 200);
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
    public function store(Request $request)
    {
        $uud = new Uud();
        $uud->bab = $request->input('bab');
        $uud->pasal = $request->input('pasal');
        $uud->judul = $request->input('judul');
        $uud->ayat = $request->input('ayat');
        $uud->bunyi = $request->input('bunyi');
        $uud->save();

        return response()->json([
            'status' => 201,
            'data' => $uud 
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uud = Uud::find($id);

        if($uud){
            return response()->json([
                'status' => 200,
                'data' => $uud
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan.'
            ], 404);
        }
    }

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
        $uud = Uud::find($id);
        if($uud){
            $uud->bab = $request->bab ? $request->bab : $uud->bab;
            $uud->pasal = $request->pasal ? $request->pasal : $uud->pasal;
            $uud->judul = $request->judul ? $request->judul : $uud->judul;
            $uud->ayat = $request->ayat ? $request->ayat : $uud->ayat;
            $uud->bunyi = $request->bunyi ? $request->bunyi : $uud->bunyi;
            $uud->save();

            return response()->json([
                'status' => 200,
                'data' => $uud
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan, gagal update data.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uud = Uud::where("id", $id)->first();
        if($uud){
            $uud->delete();
            return response()->json([
                'status' => 200,
                'data' => $uud
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan, gagal menghapus data.'
            ], 404);
        }
    }
}
