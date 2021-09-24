@extends('layouts.master')

@section('title')
    Clients
@endsection

@section('headername')
    Clients
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Client</h4>
                <br>
              @if (request()->id > 0)
                    <form action="{{ url('client_update',['id'=>$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
              @else
              <form action="{{ url('client_insert') }}" method="POST">
                @csrf
              @endif
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter name here..." name="client_name" value="{{ is_null($data->client_name) ? '' : $data->client_name }}"> 
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Contact</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter Contact here......" name="contact" value="{{ is_null($data->contact) ? '' : $data->contact }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <label>CNIC</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter cnic here..." name="cnic" value="{{ is_null($data->cnic) ? '' : $data->cnic }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                                <input class="form-control" type="date" placeholder="Contact" name="date" id="example-search-input" value="{{ is_null($data->date) ? date('Y-m-d') : $data->date }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Location</label>
                            <div class="form-group">
                                <select name="location_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($location_array as $array)
                                        @if ($data->location_id == $array->id)
                                            <option value="{{ $array->id }}" selected>{{ $array->location_name }}</option>
                                        @else
                                        <option value="{{ $array->id }}">{{ $array->location_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Open Balance</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Open Balance" id="example-search-input" name="open_balance" value="{{ is_null($data->open_balance) ? '' : $data->open_balance }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            @if ($data->type == 'client')
                                    <input type="radio" name="type" id="" value="client" checked>
                                    <label for="client">Client</label>
                            @else
                            <input type="radio" name="type" id="" value="client">
                            <label for="client">Client</label>
                            @endif
                            
                            @if ($data->type == 'investor')
                                <input type="radio" name="type" id="" value="investor" checked>
                                <label for="investor">Investor</label>  
                            @else
                                <input type="radio" name="type" id="" value="investor">
                                <label for="investor">Investor</label>  
                            @endif
                                                 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Address</label>
                            <div class="form-group">
                                <textarea name="address" id="" cols="85" rows="10" class="form-control">{{ is_null($data->address) ? '' : $data->address }}</textarea>
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