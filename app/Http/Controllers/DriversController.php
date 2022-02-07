<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Driver;

class DriversController extends Controller
{
    function driverIndex()
    {
        $data = DB::table('drivers')
            ->join('teams', 'drivers.id_team', '=', 'teams.id')
            ->select('drivers.id','drivers.name', 'drivers.country', 'teams.teamname')
            ->get();
        return view('drivers', compact('data'));
    }

    function driverEditIndex(Request $request)
    {
        $data = DB::table('drivers')
            ->join('teams', 'drivers.id_team', '=', 'teams.id')
            ->select('drivers.id','drivers.name', 'drivers.country', 'teams.teamname')
            ->get();
        return view('driversedit', compact('data'));
    }

    function driversUpdate(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'country'=>'required',
            'team'=>'required'
        ]);

        $driver = new Driver();
        $driver->name = $request->input('name');
        $driver->country = $request->input('country');
        $driver->id_team = DB::table('teams')
            ->where('teamname', '=', $request->team)
            ->value('id');
        $driver->save();

        return redirect('drivers');

    }

    function driverAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                DB::table('results')
                    ->where('id', '=', $request->id)
                    ->update([
                        'name' => $request->name,
                        'country' => $request->country
                    ]);
            }
            if($request->action == 'delete')
            {
                DB::table('results')
                    ->where('id', '=', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
