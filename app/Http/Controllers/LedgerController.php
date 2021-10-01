<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentModel;
use DB;
class LedgerController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->client_id;
        $data = DB::select("SELECT
        p.*,
        c.client_name,
        c.open_balance,
        c.date
    FROM
        payments p
    JOIN clients c ON
        c.id = p.client_id
    WHERE
        p.is_deleted = 0 AND p.client_id = '".$id."'
    ORDER BY
        p.id
    DESC
        ");
        //dd($data);
        return view('Ledger.index',compact('data'));
    }
    public function create($id)
    {

        return view('Ledger.forms');
    }
    public function view()
    {
        return view('Ledger.index');
    }


    public function SaveTransaction(Request $request){
        if ($request->ledger_id == 1 ) {
            PaymentModel::create([
                'client_id' => $request->id,
                'date' => $request->date,
                'description' => $request->desc,
                'debit_card' => $request->amount,
                'type' => 'Client',
                'credit_card' => 0,
                'created_by' => 1,
            ]);
        }
            if ($request->ledger_id == 0 ) {
                PaymentModel::create([
                    'client_id' => $request->id,
                    'date' => $request->date,
                    'description' => $request->desc,
                    'debit_card' => 0,
                    'credit_card' => $request->amount,
                    'type' => 'Client',
                    'created_by' => 1,
                ]);
        }
      
        return redirect('ledger');
    }
}
