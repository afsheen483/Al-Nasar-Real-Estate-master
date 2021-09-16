@extends('layouts.master')

@section('title')
    View Purchase Lands
@endsection


@section('headername')
    Purchase Lands Details
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
                        <th>Measurments</th>
                        <th>Location</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Expense</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>UpdateAt</th>
                        <th>Action</th>
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