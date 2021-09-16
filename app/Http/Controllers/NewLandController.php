<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewLandController extends Controller
{
    public function create($id)
    {
        return view('Land.form');
    }
    public function index()
    {
        return view('Land.index');
    }
    public function viewPurchaseLands()
    {
        return view('Land.view_purchase_land');
    }
    public function viewUnsoldLands()
    {
        return view('Land.view_unsold_land');
    }
    public function viewSoldLands()
    {
        return view('Land.view_sold_land');
    }
}
