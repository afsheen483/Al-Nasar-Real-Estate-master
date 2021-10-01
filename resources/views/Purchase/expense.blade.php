@extends('layouts.master')

@section('title')
    Expenses
@endsection

@section('headername')
    Expenses
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Expense</h4>
                <br>
               
              @if (request()->id > 0)
                     <form action="{{ url('expense_update',['id'=>$data->id]) }}" id="form" method="POST">
                        @csrf
                        @method('PUT')
              @else
              <form action="{{ url('expense_insert') }}" id="form" method="POST">
                @csrf
              @endif
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Purchase</label>
                            <div class="form-group">
                                <select name="purchase_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($purchase_array as $array)
                                        @if ($data->purchase_id == $array->id)
                                         <option value="{{ $array->id }}" selected>{{ $array->description }}</option>
                                        @else
                                        <option value="{{ $array->id }}">{{ $array->description }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Amount</label>
                            <div class="form-group">
                               <input type="text" name="amount" id="" class="form-control" placeholder="Enter amount" value="{{ is_null($data->amount) ? '' : $data->amount }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Date</label>
                            <div class="form-group">
                               <input type="date" name="date" id="" class="form-control" value="{{ is_null($data->date) ? date('Y-m-d') : $data->date }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-success" id="clear" type="button">Clear</button>
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
            $("#clear").click(function(){
            $("#form")[0].reset();
});
        });
    </script>
@endsection