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

                <h4 class="mt-0 header-title">Purchase</h4>
                <br>
               {{-- <form action="">
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
               </form> --}}
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
            @if (request()->id > 0)
                <form action="{{ url('purchase_update',['id',$data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            @else
            <form action="{{ url('purchase_insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endif
            
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Client Name</label>
                            <div class="form-group">
                                <select name="client_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($client_array as $array)
                                        @if ($data->client_id == $array->id)
                                        <option value="{{ $array->id }}" selected>{{ $array->client_name }}</option>
                                        @else
                                        <option value="{{ $array->id }}">{{ $array->client_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Mauza Name</label>
                            <div class="form-group">
                                <select name="mauza_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($mauza_array as $array)
                                        @if ($data->mauza_id == $array->id)
                                        <option value="{{ $array->id }}" selected>{{ $array->mauza_name }}</option>
                                        @else
                                        <option value="{{ $array->id }}">{{ $array->mauza_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      
                        <div class="col-3">
                            <label>File</label>
                            <div class="form-group">
                                <input  type="file" name="image"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Sale Amount</label>
                            <div class="form-group">
                                <input  type="text" name="sale_amount" placeholder="Enter amount here..." required class="form-control" value="{{ is_null($data->sale_amount) ? '' : $data->sale_amount }}" >
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Paid Amount</label>
                            <div class="form-group">
                                <input class="form-control" name="paid_amount" type="text" placeholder="Enter paid amount here......" required value="{{ is_null($data->paid_amount) ? '' : $data->paid_amount }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness Name 1</label>
                            <div class="form-group">
                                <input class="form-control" name="witness_name_1" type="text" placeholder="Enter witness name 1 here......" required value="{{ is_null($data->witness_name_1) ? '' : $data->witness_name_1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Witness 1 CNIC</label>
                            <div class="form-group">
                                <input  type="text" name="witness_cnic_1" placeholder="Enter witness 1 cnic here..." required class="form-control" value="{{ is_null($data->witness_cnic_1) ? '' : $data->witness_cnic_1 }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness 2 name</label>
                            <div class="form-group">
                                <input  type="text" name="witness_name_2" placeholder="Enter witness 2 name here..." required class="form-control" value="{{ is_null($data->witness_name_2) ? '' : $data->witness_name_2 }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Witness 2 CNIC</label>
                            <div class="form-group">
                                <input  type="text" name="witness_cnic_2" placeholder="Enter witness 2 cnic here..." required class="form-control" value="{{ is_null($data->witness_cnic_2) ? '' : $data->witness_cnic_2 }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                                <input class="form-control" name="date" type="date" placeholder="Enter measurements here" required  value="{{ is_null($data->date) ? date('Y-m-d') : $data->date }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea  name="address" id="" cols="85" rows="1" class="form-control">{{ is_null($data->description) ? '' : $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit" id="cart">Submit</button>
                            <button class="btn btn-success" type="button" id="submit">Clear</button>
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#cart').click(function(){
                $('#table_land').toggle();
            });
        });
    </script>
@endsection