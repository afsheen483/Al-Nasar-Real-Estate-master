<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\MauzaModel;
class MauzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::select("SELECT
            m.*,
            p.phase_name
        FROM
            mauzas m
        JOIN phases p ON
            p.id = m.phase_id
        WHERE
            m.is_deleted = 0
        ORDER BY
            m.id");
            return view('Mauza.index',compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
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
            $data = new MauzaModel();
            if ($id > 0) {
                $data = MauzaModel::find($id);
                return view('Mauza.forms',compact('data'));
            }else{
                return view('Mauza.forms',compact('data'));
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MauzaModel::create([
            'mauza_name' => $request->mauza_name,
            'phase_id' => $request->phase_id,
            'created_by' => 1
        ]);
        return redirect('mauza');
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
        MauzaModel::where('id','=',$id)->update([
            'mauza_name' => $request->mauza_name,
            'phase_id' => $request->phase_id,
            'updated_by' => 1
        ]);
        return redirect('mauza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete =  MauzaModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete) {
            return 1;
        }
      
    }
}
