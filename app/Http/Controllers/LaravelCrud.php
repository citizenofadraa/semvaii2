<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Track;

class LaravelCrud extends Controller
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

    function index()
    {
        $tracks = DB::select('select * from tracks');
        return view('welcome', ['tracks' => $tracks]);
    }

    function editIndex()
    {
        $tracks = DB::select('select * from tracks');
        return view('tracksedit', ['tracks' => $tracks]);
    }

    function update(Request $request){
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
            return redirect('teams');
    }

    function delete($id){
        $delete = DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect('/');
    }

    function tracksUpdate(Request $request)
    {
        $request->validate([
            'trackname'=>'required',
            'country'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);

        $track = new Track();
        $track->trackname = $request->input('trackname');
        $track->country = $request->input('country');
        $track->date = $request->input('date');
        $track->time = $request->input('time');
        $track->save();

        return redirect('/');

    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $teams = array(
                    'trackname'=>$request->trackname,
                    'country'=>$request->country,
                    'date'=>$request->date,
                    'time'=>$request->time
                );
                DB::table('tracks')
                    ->where('id', '=', $request->id)
                    ->update($teams);
            }
            if($request->action == 'delete')
            {
                DB::table('tracks')
                    ->where('id', '=', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
