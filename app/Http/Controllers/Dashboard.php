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
        $sel_tan = $request->tan ?? 18;

        $tans = Config::get('gaole.tan');

//        $mydisks = Auth::user()->mydisks()->get();
//        $mydisks = Auth::user()->mydisks()->select('gaoledisks.diskNumber', DB::raw('count(gaoledisks.diskNumber) as cnt'))->groupBy('gaoledisks.diskNumber')->pluck('cnt','gaoledisks.diskNumber')->toArray();

        $mydisks = Auth::user()->mydisks()
            ->select('gaoledisks.diskNumber')
            ->groupBy('gaoledisks.diskNumber')
            ->pluck('gaoledisks.diskNumber')->toArray();


        $disks = gaoledisk::where('tan', '=', $sel_tan)
            ->where('seong','=',5)
            ->orderBy('created_at', 'desc')
            ->get()->map(function ($item) use ($mydisks) {

                return [
                    'diskName' => $item->diskName,
                    'diskNumber' => $item->diskNumber,
                    'diskImage' => $item->diskImage,
                    'haveDisk' => in_array($item->diskNumber, $mydisks) ? 1 : 0,
                ];
            });

        return view('dashboard', compact('tans', 'sel_tan', 'disks'));
    }
}
