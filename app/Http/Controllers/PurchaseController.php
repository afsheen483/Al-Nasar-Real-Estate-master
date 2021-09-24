<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseModel;
use App\Models\PaymentModel;
use DB;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter)
    {
        if($filter == 'view_purchase'){
            $data = DB::select("SELECT
                            p.*,
                            m.mauza_name,
                            c.client_name
                        FROM
                            purchase p
                        JOIN mauzas m ON
                            p.mauza_id = m.id
                        JOIN clients c ON
                            c.id = p.client_id
                        WHERE
                            p.is_deleted = 0
                        ORDER BY
                            p.id");
            return view('Purchase.index',compact('data'));
        }
       
        if ($filter == 'complete_purchase') {
            $data = DB::select("SELECT
                    p.*,
                    m.mauza_name,
                    c.client_name
                FROM
                    purchase p
                JOIN mauzas m ON
                    p.mauza_id = m.id
                JOIN clients c ON
                    c.id = p.client_id
                WHERE
                    p.is_deleted = 0 AND p.status = 1
                ORDER BY
                    p.id");
            return view('Purchase.index',compact('data'));
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new PurchaseModel();
        if ($id > 0) {
            $data = PurchaseModel::find($id);
            return view('Purchase.form',compact('data'));
        }
        return view('Purchase.form',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->witness_name_2);
        $image=$request->file('image');
        //dd($image);
        $file = $image->getClientOriginalName();
        $base_path = 'upload/';
        $image->move('upload',$file);
        $purchase_id = PurchaseModel::create([
        'mauza_id' => $request->mauza_id,
        'client_id'=> $request->client_id,
        'date' => $request->date,
        'file' => $base_path.$file,
        'sale_amount' => $request->sale_amount,
        'paid_amount' => $request->paid_amount,
        'witness_name_1' => $request->witness_name_1,
        'witness_cnic_1' => $request->witness_cnic_1,
        'witness_name_2' => $request->witness_name_2,
        'witness_cnic_2' => $request->witness_cnic_2,
        'description' => $request->address,
        'created_by' => 1,
        
        ])->id;
        PaymentModel::create([
            'purchase_id' => $purchase_id,
            'client_id' => $request->client_id,
            'description' => 'Expense',
            'type' => 'Purchase',
            'created_by'=>1
        ]);
        return redirect('purchase/view_purchase');
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
        $image=$request->file('image');
        $file = $image->getClientOriginalName();
        $base_path = 'upload/';
        $image->move('upload',$file);
        PurchaseModel::where('id','=',$id)->update([
        'mauza_id' => $request->mauza_id,
        'client_id'=> $request->client_id,
        'date' => $request->date,
        'file' => $base_path.$file,
        'sale_amount' => $request->sale_amount,
        'paid_amount' => $request->paid_amount,
        'witness_name_1' => $request->witness_name_1,
        'witness_cnic_1' => $request->witness_cnic_1,
        'witness_name_2' => $request->witness_name_2,
        'witness_cnic_2' => $request->witness_cnic_2,
        'description' => $request->address,
        'created_by' => 1,
        
        ])->id;
        PaymentModel::where('purchase_id','=',$id)->update([
            'purchase_id' => $purchase_id,
            'client_id' => $request->client_id,
            'description' => 'Expense',
            'type' => 'Purchase',
        ]);
        return redirect('purchase/view_purchase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PurchaseModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete) {
            return 1;
        }
    }
    public function DateSearch(Request $request,$date)
    {
        //dd($request->all());
      
        if ($date) {
            $data = DB::select("SELECT
            p.*,
            m.mauza_name,
            c.client_name
        FROM
            purchase p
        JOIN mauzas m ON
            p.mauza_id = m.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0 AND p.date = '".$date."'
        ORDER BY
            p.id");
            return view('Purchase.index',compact('data'));
        }
       
    }
    public function DateSearchBetween(Request $request)
    {
        if ( $request->to_date != '' && $request->from_date != '') {
           //dd($request->all());
            $data = DB::select("SELECT
            p.*,
            m.mauza_name,
            c.client_name
        FROM
            purchase p
        JOIN mauzas m ON
            p.mauza_id = m.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0 AND p.date <= '". $request->from_date."' AND p.date >= '".$request->to_date."'
        ORDER BY
            p.id");
            //dd($data);
            return view('Purchase.index',compact('data'));
        }
        if ($request->from_date) {
            $data = DB::select("SELECT
            p.*,
            m.mauza_name,
            c.client_name
        FROM
            purchase p
        JOIN mauzas m ON
            p.mauza_id = m.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0 AND p.date = '".$request->from_date."' 
        ORDER BY
            p.id");
          //  dd($data);
            return view('Purchase.index',compact('data'));
        }
        if ($request->to_date) {
            $data = DB::select("SELECT
            p.*,
            m.mauza_name,
            c.client_name
        FROM
            purchase p
        JOIN mauzas m ON
            p.mauza_id = m.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0 AND p.date = '".$request->to_date."' 
        ORDER BY
            p.id");
          //  dd($data);
            return view('Purchase.index',compact('data'));
        }
       
    }
}
