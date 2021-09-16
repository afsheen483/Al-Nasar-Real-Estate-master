@extends('layouts.master')

@section('title')
    Plots
@endsection

@section('headername')
    Plots
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Plot</h4>
                <br>
               <form action="">
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>File</label>
                            <div class="form-group">
                                <input  type="file" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter name here......" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit" id="cart">Add to Cart</button>
                            <button class="btn btn-success">Clear</button>
                        </div>
                    </div>

                </div>
               </form>
               <br>

               <div class="table-responsive">
                <table class="table mb-0" id="table_plot" style="display: none">
                    <thead>
                        <tr>
                            <th>Plot File</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>

            <br><br><br>

            <form action="">
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Name</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter name here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Measurments</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter measurements here......" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Location</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter location here......" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Amount</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter amount here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Expenses</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter expenses here......" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Total Amount</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter location here......" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                                <input  type="date" placeholder="Enter name here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Status</label>
                            <div class="form-group">
                                <select name="status" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Address</label>
                            <div class="form-group">
                               <input type="text" name="address" id="" class="form-control" placeholder="Enter address">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea name="address" id="" cols="85" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit" id="cart">Submit</button>
                            <button class="btn btn-success">Clear</button>
                        </div>
                    </div>

                </div>
               </form>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->   

@endsection


    
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#cart').click(function(){
                $('#table_plot').toggle();
            });
        });
    </script>
@endsection