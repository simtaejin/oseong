<?php

namespace App\Http\Controllers;

use App\Models\gaoledisk;
use App\Models\mydisk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;

class MydiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sel_tan = $request->tan ?? 21;

        $tans = Config::get('gaole.tan');

        $mydisks = Auth::user()->mydisks()
                ->select('gaoledisks.diskNumber')
                ->groupBy('gaoledisks.diskNumber')
                ->pluck('gaoledisks.diskNumber')->toArray();

        $disks = gaoledisk::where('tan', $sel_tan)
            ->where('seong', 5)
            ->orderBy('created_at', 'desc')
            ->whereIn('diskNumber', $mydisks)
            ->get(['id', 'diskName', 'diskNumber', 'diskImage', 'diskType'])
            ->map(function ($item) {
                return [
                    'diskId' => $item->id,
                    'diskName' => $item->diskName,
                    'diskNumber' => $item->diskNumber,
                    'diskImage' => $item->diskImage,
                    'diskType' => $item->diskType,
                ];
            });

        return view('mypage.mydisk', compact('sel_tan', 'tans', 'disks', 'tans'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mydisk  $mydisk
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        $gaoledisk_id = $id;
        $disk_info = gaoledisk::where('id', '=', $id)->first();

        $acquisition_method_list = Config::get('gaole.acquisition_method_list');

        $mydisks = mydisk::where('user_id', '=', Auth::user()->id)
            ->where('gaoledisk_id','=', $gaoledisk_id)
            ->with('gaoledisks','gaolestore')
            ->get()->map(function ($item) use ($acquisition_method_list)  {

                return [
                    'id' => $item->id,
                    'gaoledisk_id' => $item->gaoledisk_id,
                    'gaolestore_id' => $item->gaolestore_id,
                    'gaolestore_title' => $item->gaolestore->title,
                    'acquisition_method' => $acquisition_method_list[$item->acquisition_method],
                    'acquisition_date' => substr($item->acquisition_date, 0, 10),
                ];
            });

        return view('mypage.mydisk_show', compact('gaoledisk_id', 'disk_info', 'mydisks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mydisk  $mydisk
     * @return \Illuminate\Http\Response
     */
    public function edit(mydisk $mydisk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mydisk  $mydisk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mydisk $mydisk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mydisk  $mydisk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mydisk::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->delete();
        return redirect()->route('mypage-gaoledisk');
    }
}
