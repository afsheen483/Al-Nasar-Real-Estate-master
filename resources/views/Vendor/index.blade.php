@extends('layouts.master')

@section('title')
    Vendors
@endsection

@section('headername')
    Vendors
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Open Balance</th>
                    </tr>
                    </thead>


                    <tbody>
           
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> 



@endsection