<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationModel;
use DB;
use Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = LocationModel::where('is_deleted','=',0)->get();
            return view('Location.index',compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try {
            $data = new LocationModel();
            if ($id > 0) {
                $data = LocationModel::find($id);
                return view('Location.forms',compact('data'));
            }else{
                return view('Location.forms',compact('data'));
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        return view('Location.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = Auth::user()->id;
        LocationModel::create([
            'location_name' => $request->location_name,
            'created_by' => 1
        ]);
        return redirect('location');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        LocationModel::where('id','=',$id)->update([
            'location_name' => $request->location_name
        ]);
        return redirect('location');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LocationModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($data) {
            return 1;
        }
    }
}
