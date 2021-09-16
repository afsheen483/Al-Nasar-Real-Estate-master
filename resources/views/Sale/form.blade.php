@extends('layouts.master')

@section('title')
    Sale
@endsection

@section('headername')
    Sale
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Sale</h4>
                <br>
               <form action="">
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Propert Type</label>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Property Name</label>
                            <div class="form-group"> 
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Property Rate</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter name here......" readonly>
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

               {{-- <div class="table-responsive">
                <table class="table mb-0" id="table_land" style="display: none">
                    <thead>
                        <tr>
                            <th>Land File</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div> --}}

            <br><br><br>

            <form action="">
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Client Name</label>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                                <input class="form-control" type="date" placeholder="Enter measurements here......" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>File</label>
                            <div class="form-group">
                                <input  type="file" placeholder="Enter location here......" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Sale Amount</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter amount here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Paid Amount</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter paid amount here......" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness Name 1</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter witness name 1 here......" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Witness 1 CNIC</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter witness 1 cnic here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness 2 name</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter witness 2 name here..." required class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness 2 CNIC</label>
                            <div class="form-group">
                                <input  type="text" placeholder="Enter witness 2 cnic here..." required class="form-control">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Status</label>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
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
                $('#table_land').toggle();
            });
        });
    </script>
@endsection