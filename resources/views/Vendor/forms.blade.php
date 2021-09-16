@extends('layouts.master')

@section('title')
    Create Venodrs
@endsection

@section('headername')
    Vendors
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Vendor</h4>
                <br>
               <form action="">
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter name here...">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Contact</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter Contact here......">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <label>CNIC</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter cnic here...">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                                <input class="form-control" type="date" placeholder="Contact" id="example-search-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Status</label>
                            <div class="form-group">
                                <select name="status" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Open Balance</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Open Balance" id="example-search-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Address</label>
                            <div class="form-group">
                                <textarea name="address" id="" cols="85" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-success">Clear</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->      


@endsection