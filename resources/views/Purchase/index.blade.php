@extends('layouts.master')

@section('title')
    Purchase
@endsection

@section('headername')
    Purchase
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                @if (request()->filter == 'specific_date')
                <div class="" style="margin-left: 1.45%">
                    <form action="">
                        <div class="row">
                            <div class="col-2">
                                 <input type="date" name="date" id="" class="form-control" required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                @endif
                @if (request()->filter == 'between_date')
                <div class="" style="margin-left: 1.45%">
                    <form action="">
                        <div class="row">
                            <div class="col-2">
                                <label for="">To Date</label>
                                 <input type="date" name="date" id="" class="form-control" required>
                            </div>
                            <div class="col-2">
                                <label for="">End Date</label>
                                <input type="date" name="date" id="" class="form-control" required>
                           </div>
                            <div class="col-2" style="margin-top: 2%">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                @endif
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>ClientName</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>Sale Amount</th>
                        <th>Paid Amount</th>
                        <th>Witness 1 Name</th>
                        <th>Witness 1 CNIC</th>
                        <th>Witness 2 Name</th>
                        <th>Witness 2 CNIC</th>
                        <th>Status</th>
                        <th>Description</th>
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