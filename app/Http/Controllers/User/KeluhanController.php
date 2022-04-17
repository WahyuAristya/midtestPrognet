<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Keluhan;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::User()->id;

        $keluhans = Keluhan::select("*")->where("user_id","=",$idUser)->get();

        return view('keluhan.index', [
            "title" => "Keluhan",
            "active" => "Posts",
            "keluhans" => $keluhans
        ]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluhan.create', [
            'title' => 'Created',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = Auth::User()->id;
        $validateData = $request->validate([
            'keluhan' => 'required|max:100',
        ]);

        $keluhan = new Keluhan;
        $keluhan->user_id=$idUser;
        $keluhan->keluhan=$request->keluhan;
        $keluhan->save();

        $reply = new Reply;
        $reply->keluhan_id=$keluhan->id;
        $reply->save();

        return redirect('/keluhan')->with('success', 'new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluhan = Keluhan::find($id);
        return view('keluhan.edit', [
            'keluhan' => $keluhan,
            'title' => 'Edit keluhan',
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // dd($request->keluhan_id);
         $rules = [
            'keluhan' => 'required|max:100',
        ];

        $validateData = $request->validate($rules);

        Keluhan::find($id)->update($validateData);

        return redirect('/keluhan')->with('success', 'Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $keluhans = Reply::find($id, 'keluhan_id');
        // $keluhans->delete();

        $keluhans = DB::table('replies')->where('keluhan_id', $id);
        $keluhans->delete();

        $keluhan = Keluhan::find($id); 
        $keluhan->delete();

        return redirect('/keluhan')->with('success', 'Post has been deleted!');
    }
}
