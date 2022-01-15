<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
        $tracks = new Track();
        $tracks = DB::table('tracks');
        return view('welcome', compact('tracks'));
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
            return redirect('update');
    }

    function delete($id){
        $delete = DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect('/');
    }
}
