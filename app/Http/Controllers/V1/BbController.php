<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\bb\Client as ClientAuthorization;

class BbController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): object
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cnpj
     * @return \Illuminate\Http\Response
     */
    public function show($cnpj)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function regiterBoleto(Request $request){
        $attribute = $request->all();
        // return response()->json(['data' => app(ClientAuthorization::class)->bb($attribute)]);


        return response()->json(['data' => app('Text')->bb($attribute)]);
    }

}
