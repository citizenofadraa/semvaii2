<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Team;

class TeamsController extends Controller
{
    function teamsIndex()
    {
        $teams = DB::table('teams')->get();
        return view('teams', compact('teams'));
    }

    function teamsEditIndex()
    {
        $teams = DB::table('teams')->get();
        return view('teamsedit', compact('teams'));
    }

    function teamsUpdate(Request $request)
    {
        $request->validate([
            'teamname'=>'required',
            'country'=>'required'
        ]);

        $team = new Team();
        $team->teamname = $request->input('teamname');
        $team->country = $request->input('country');
        $team->save();

        return redirect('teams');

    }

    function teamsAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $teams = array(
                    'teamname'=>$request->teamname,
                    'country'=>$request->country
                );
                DB::table('teams')
                    ->where('id', '=', $request->id)
                    ->update($teams);
            }
            if($request->action == 'delete')
            {
                DB::table('teams')
                    ->where('id', '=', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
