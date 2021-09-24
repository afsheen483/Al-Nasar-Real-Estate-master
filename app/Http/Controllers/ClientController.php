<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ClientModel;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT
                    c.*,
                    l.location_name
                FROM
                    clients c
                JOIN locations l ON
                    l.id = c.location_id
                WHERE
                    c.is_deleted = 0
                ORDER BY c.id');
        return view('Client.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
       $data = new ClientModel();
       if ($id > 0) {
          $data =  ClientModel::find($id);
          return view('Client.forms',compact('data'));
       }else{
        return view('Client.forms',compact('data'));
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
        ClientModel::create([
        'client_name' => $request->client_name,
        'contact' => $request->contact,
        'cnic' => $request->cnic,
        'date' => $request->date,
        'location_id' => $request->location_id,
        'open_balance' => $request->open_balance,
        'type' => $request->type,
        'address' => $request->address,
        'created_by' => 1
        ]);
        return redirect('clients');
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
        ClientModel::where('id','=',$id)->update([
            'client_name' => $request->client_name,
            'contact' => $request->contact,
            'cnic' => $request->cnic,
            'date' => $request->date,
            'location_id' => $request->location_id,
            'open_balance' => $request->open_balance,
            'type' => $request->type,
            'address' => $request->address,
            ]);
            return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ClientModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete) {
            return 1;
        }
    }
}
