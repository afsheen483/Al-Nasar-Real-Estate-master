<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhaseModel;
use DB;
use Auth;
class PhaseController extends Controller
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
            p.*,
            l.location_name
        FROM
            phases p
        JOIN locations l ON
            p.location_id = l.id
        WHERE
            p.is_deleted = 0
        ORDER BY 
        p.id DESC
        ");
            return view('Phase.index',compact('data'));
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
            $data = new PhaseModel();
            if ($id > 0) {
                $data = PhaseModel::find($id);
                return view('Phase.forms',compact('data'));
            }else{
                return view('Phase.forms',compact('data'));
            }
        } catch (\Throwable $th) {
            //throw $th;
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
        PhaseModel::create([
            'phase_name' => $request->phase_name,
            'location_id' => $request->location_id,
            'created_by' => 1
        ]);
        return redirect('phase');
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
        PhaseModel::where('id','=',$id)->update([
            'phase_name' => $request->phase_name,
            'location_id' => $request->location_id,
            'updated_by' => 1
        ]);
        return redirect('phase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PhaseModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete) {
            return 1;
        }
    }
}
