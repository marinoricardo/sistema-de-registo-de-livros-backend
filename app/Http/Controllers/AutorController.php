<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autores = Autor::get();
        return response()->json(['data' => $autores, 'message' => "Lista de Autores"], 200);
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
        $request->validate([
            'name' => 'required'
        ]);

        $autor = new Autor();
        $autor->name = $request->name;
        $autor->save();

        return response()->json(['data' => $autor ,'message' => "Autor criado com Sucesso"], 200);
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
        $autor = Autor::find($id);
        return response()->json(['data' => $autor ,'message' => "Lista de autor"], 200);
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
        $request->validate([
            'name' => 'required'
        ]);

        $autor = Autor::find($id);
        $autor->name = $request->name;
        $autor->save();

        return response()->json(['data' => $autor ,'message' => "Autor actualizado com Sucesso"], 200);
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
        $autor = Autor::find($id);
        $autor->delete();

        return response()->json(['data' => $autor ,'message' => "Autor removido com Sucesso"], 200);
    }
}
