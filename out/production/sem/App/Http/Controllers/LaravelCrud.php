<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use app\Models\Team;

class LaravelCruda extends Controller
{
    function edit($id){
        $row = DB::table('users')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row,
            ];

        return view('edit', $data);
    }

    function indexa2()
    {
        $tracks = DB::select('select name, country, time, date from tracks');
        return view('welcome', ['tracks' => $tracks]);
    }

    function index2()
    {
        $teams = DB::select('select * from teams');
        return view('teams', ['teams' => $teams]);
    }

    function index3()
    {
        $data = DB::table('drivers')
            ->join('teams', 'drivers.id_team', '=', 'teams.id')
            ->select('drivers.name', 'drivers.country', 'teams.name')
            ->get();
        return view('drivers', compact('data'));
    }

    function index4()
    {
        $driverName = DB::select('select name from drivers');
        return view('results', ['results' => $driverName]);
    }

    function updatea2(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $updating = DB::table('users')
            ->where('id', $request->input('cid'))
            ->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email')
            ]);
            return redirect('update');
    }

    function delete2($id){
        $delete = DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect('/');
    }

    public function updateInLine3(Request $request) {
        if ($request->ajax()) {
            Team::find($request->pk)
                ->update([$request->name => $request->value]);

            return response()->json(['success' => true]);
        }
    }
}
