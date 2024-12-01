<?php

namespace App\Http\Controllers;

use App\Models\gaoledisk;
use App\Models\gaolestore;
use App\Models\mydisk;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index(Request $request)
    {
        $sel_tan = $request->tan ?? 20;

        $tans = Config::get('gaole.tan');

//        $mydisks = Auth::user()->mydisks()->get();
//        $mydisks = Auth::user()->mydisks()->select('gaoledisks.diskNumber', DB::raw('count(gaoledisks.diskNumber) as cnt'))->groupBy('gaoledisks.diskNumber')->pluck('cnt','gaoledisks.diskNumber')->toArray();


        if (Auth::check()) {
            $mydisks = Auth::user()->mydisks()
                ->select('gaoledisks.diskNumber')
                ->groupBy('gaoledisks.diskNumber')
                ->pluck('gaoledisks.diskNumber')->toArray();
        } else {
            $mydisks = null;
        }


        $disks = gaoledisk::where('tan', '=', $sel_tan)
            ->where('seong','=',5)
            ->orderBy('created_at', 'desc')
            ->get()->map(function ($item) use ($mydisks) {

                return [
                    'diskId' => $item->id,
                    'diskName' => $item->diskName,
                    'diskNumber' => $item->diskNumber,
                    'diskImage' => $item->diskImage,
                    'diskType' => $item->diskType,
//                    'haveDisk' => in_array($item->diskNumber, $mydisks) ? 1 : 0,
                    'haveDisk' => $mydisks ? (in_array($item->diskNumber, $mydisks) ? 1 : 0) : 0,
                ];
            });

        return view('dashboard_index', compact('tans', 'sel_tan', 'disks'));
    }

    public function detail(Int $id)
    {
        $gaoledisk_id = $id;
        $disk_info = gaoledisk::where('id', '=', $id)->first();
        $mystores = Auth::user()->mystores()->get()->toArray();

        $acquisition_method_list = Config::get('gaole.acquisition_method_list');

         if (Auth::check()) {
             $mydisks = mydisk::where('user_id', '=', Auth::user()->id)->where('gaoledisk_id','=', $gaoledisk_id)->with('gaoledisks','gaolestore')->get()->toArray();
         } else {
             $mydisks = [];
         }

        return view('dashboard_detail', compact('gaoledisk_id', 'disk_info', 'acquisition_method_list', 'mystores'));
    }

    public function store(Request $request)
    {
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

        return redirect(route('dashboard'));
    }
}
