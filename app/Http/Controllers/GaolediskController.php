<?php

namespace App\Http\Controllers;

use App\Models\gaoledisk;
use App\Models\gaolestore;
use App\Models\mydisk;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Auth;

class GaolediskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Int $id)
    {
        $gaoledisk_id = $id;
        $disk_info = gaoledisk::where('id', '=', $id)->first();
        $store_list = gaolestore::groupBy('id')->pluck('title','id')->toArray();
        $acquisition_method_list = Config::get('gaole.acquisition_method_list');


        $mydisks = mydisk::where('user_id', '=', Auth::user()->id)->where('gaoledisk_id','=', $gaoledisk_id)->with('gaoledisks','gaolestore')->get()->toArray();



        return view(
            'gaoledisk.index',
            compact('gaoledisk_id',
                    'disk_info',
                                'store_list',
                                'acquisition_method_list',
                                'mydisks'
            ));
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
        $gaoledisk_id = $request->input('gaoledisk_id');
        $gaolestore_id = $request->input('gaolestore_id');
        $acquisition_method = $request->input('acquisition_method');
        $acquisition_date = $request->input('acquisition_date');

        mydisk::create([
            'user_id' => Auth::user()->id,
            'gaoledisk_id' => $gaoledisk_id,
            'gaolestore_id' => $gaolestore_id,
            'acquisition_method' => $acquisition_method,
            'acquisition_date' => $acquisition_date,
        ]);

        return redirect('/gaoledisk/'.$gaoledisk_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gaoledisk  $gaoledisk
     * @return \Illuminate\Http\Response
     */
    public function show(gaoledisk $gaoledisk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gaoledisk  $gaoledisk
     * @return \Illuminate\Http\Response
     */
    public function edit(gaoledisk $gaoledisk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gaoledisk  $gaoledisk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gaoledisk $gaoledisk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gaoledisk  $gaoledisk
     * @return \Illuminate\Http\Response
     */
    public function destroy(gaoledisk $gaoledisk)
    {
        //
    }
}
