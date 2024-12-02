<?php

namespace App\Http\Controllers;

use App\Models\gaolestore;
use App\Models\mystore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MystoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store_list = gaolestore::pluck('title','id')->toArray();
        $mystores = Auth::user()->mystores()->get()->toArray();

        return view('mypage.mystore', compact('store_list', 'mystores'));
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
        //
        $gaolestore_id = $request->input('gaolestore_id');

        mystore::create([
            'user_id' => Auth::user()->id,
            'gaolestore_id' => $gaolestore_id,
        ]);

        return redirect(route('mypage-gaolestore'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mystore  $mystore
     * @return \Illuminate\Http\Response
     */
    public function show(mystore $mystore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mystore  $mystore
     * @return \Illuminate\Http\Response
     */
    public function edit(mystore $mystore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mystore  $mystore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mystore $mystore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mystore  $mystore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mystore::where('user_id', '=', Auth::user()->id)->where('gaolestore_id', '=', $id)->delete();
        return redirect(route('mypage-gaolestore'));
    }
}
