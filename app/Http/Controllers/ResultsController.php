<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Results;

class ResultsController extends Controller
{
    function index()
    {
        $driverName = DB::select('select id, name from drivers');
        return view('results', ['results' => $driverName]);
    }

    function indexEdit()
    {
        $data = DB::table('results')
            ->join('drivers', 'results.id_driver', '=', 'drivers.id')
            ->join('tracks', 'results.id_track', '=', 'tracks.id')
            ->select('results.id', 'drivers.name', 'tracks.trackname', 'results.result')
            ->get();
        return view('resultsdriveredit', compact('data'));
    }

    function table(Request $request) {

        $data = DB::table('results')
            ->join('tracks', 'tracks.id', '=', 'results.id_track')
            ->join('drivers', 'drivers.id', '=', 'results.id_driver')
            ->select('results.id', 'drivers.name', 'tracks.trackname', 'results.result')
            ->where('drivers.id', '=', $request->name)
            ->get();

        return view('resultsdriver', ['resultsdriver' => $data]);
    }

    function resultsUpdate(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'trackname'=>'required',
            'result'=>'required'
        ]);

        $result = new Results();
        $result->id_driver = DB::table('drivers')
            ->where('name', '=', $request->name)
            ->value('id');
        $result->id_track = DB::table('tracks')
            ->where('trackname', '=', $request->trackname)
            ->value('id');
        $result->result = $request->result;
        $result->save();

        return redirect('results');
    }

    function resultsAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                DB::table('drivers')
                    ->where('id', '=', $request->id)
                    ->update([
                        'name' => $request->name,
                        'country' => $request->country
                    ]);
            }
            if($request->action == 'delete')
            {
                DB::table('drivers')
                    ->where('id', '=', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
