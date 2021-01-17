<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\City;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oClient = Client::join('cities as c','c.id','clients.id_city')->get(['clients.*','c.name as city']);
        return response()->json($oClient);
    }

    public function cities(){
        $oCity = City::get();
        return response()->json($oCity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sMsg = null;
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required',
            'id_city' => 'required|numeric'
        ]);
        if ($validator->fails()){
            $sMsg = 'Campos incompletos o no cumple la tipificacion';
            return response()->json($sMsg);
        }
        try {
            $oClient = Client::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'id_city' => $request->id_city,
            ]);
            $sMsg = 'Registro guardado exitasamente';
        } catch (\Throwable $th) {
            $sMsg = 'Hubo un problema al guardar el registro';
        }
        return response()->json($sMsg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oClient = Client::find($id);
        // $oClient->city = $oClient->city->name;
        return response()->json($oClient);
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required',
            'id_city' => 'required|numeric'
        ]);

        if ($validator->fails()){
            $sMsg = 'Campos incompletos o no cumple la tipificacion';
            return response()->json($sMsg);
        }

        $oClient = Client::find($id);
        $oClient->name = $request->name;
        $oClient->phone = $request->phone;
        $oClient->id_city = $request->id_city;
        $oClient->save();

        $sMsg = 'Hubo un problema al actualizar el registro';
        if($oClient){
            $sMsg = 'Registro actualizado exitasamente';
        }

        return response()->json($sMsg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oClient = Client::destroy($id);
        $sMsg = 'Registro eliminado exitasamente';
        return response()->json($sMsg);
    }
}
