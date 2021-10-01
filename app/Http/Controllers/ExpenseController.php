<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseModel;
use DB;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data =   DB::select("SELECT
                e.*,
                p.file,
                p.sale_amount,
                p.client_id,
                p.description
            FROM
                expenses e
            JOIN purchase p ON
                p.id = e.purchase_id
            WHERE
                e.is_deleted = 0
            ORDER BY
                e.id
            DESC
                ");
                return view("Purchase.expense_view",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new ExpenseModel();
        if ($id > 0) {
            $data = ExpenseModel::find($id);
            return view("Purchase.expense",compact("data"));
        }else{
            return view("Purchase.expense",compact("data"));
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
        ExpenseModel::create([
            'purchase_id' => $request->purchase_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        return redirect('expenses');
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
        ExpenseModel::where('id','=',$id)->update([
            'purchase_id' => $request->purchase_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        return redirect('expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete =  ExpenseModel::where('id','=',$id)->update([
            'purchase_id' => $request->purchase_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
      if ($delete) {
          return 1;
      }
    }
}
