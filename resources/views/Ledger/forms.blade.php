@extends('layouts.master')

@section('title')
Ledger
@endsection

@section('headername')
Ledger
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Ledger</h4>
                <br>
                @if (request()->id > 0)
                <form action="{{ url('ledger_update',['id'=>$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @else
                    <form action="{{ url('ledger_insert') }}" method="POST">
                        @csrf
                        @endif
                        <div class="container" style="margin-left:10%">
                            <div class="row">
                                <div class="col-3">
                                    <label>Client Name</label>
                                    <div class="form-group">
                                        <select name="client_id" id="client_id" class="form-control">
                                            <option value="">Select Client</option>
                                            @foreach ($client_array as $array)
                                            <option value="{{ $array->id }}">{{ $array->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label>Balance</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="open_balance" id="open_balance"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-3">
                                    <label>Date</label>
                                    <div class="form-group">
                                        <input class="form-control" type="date" placeholder="Contact" name="date"
                                            id="date" value="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label>Debit</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="debit" id="debit" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-6">
                                    <label>Credit</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="credit" name="credit" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="85" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-success" type="button" data-toggle="modal"
                                        data-target="#exampleModalLong">IN</button>
                                    <button class="btn btn-warning" type="button" data-toggle="modal"
                                        data-target="#exampleModalLong">OUT</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Transaction Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="id" name="id" hidden>

                <label>Account #</label>
                <div class="form-group">
                    <input class="form-control" type="text" id="credit" name="credit" value="">
                </div>
                <label>Description</label>
                <div class="form-group">
                    <input class="form-control" type="text" id="credit" name="credit" value="">
                </div>
                <label>Date</label>
                <div class="form-group">
                    <input class="form-control" type="date" id="credit" name="credit" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
            $("#client_id").on("change",function(){
                var id = $(this).val();
                var url = "{{url('get_client')}}";
                $.ajax({
                      
                      url : url,
                      type : 'GET',
                      cache: false,
                      data: {_token:'{{ csrf_token() }}',
                      id:id,
                      },

                      success:function(data){
                        console.log(data[0].open_balance);
                        $("#open_balance").val(data[0].open_balance);
                        $("#date").val(data[0].date);
                        $("#debit").val(data[0].debit_card);
                        $("#credit").val(data[0].credit_card);
                        $("#description").val(data[0].description);
                        $("#id").val(data[0].id);

                      }
                      });
            });
        });
</script>
@endsection