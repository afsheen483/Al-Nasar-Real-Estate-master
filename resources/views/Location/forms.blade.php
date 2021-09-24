@extends('layouts.master')

@section('title')
    Create Location
@endsection

@section('headername')
    Location
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Location</h4>
                <br>
                @if (request()->id > 0)
                <form action="{{ url('location_update',['id'=>$data->id]) }}" method="post" id="form">
                    @csrf
                    @method('PUT')
                @else
                <form action="{{ url('location_insert') }}" method="post" id="form">
                    @csrf
                @endif
              
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Location name</label>
                            <div class="form-group">
                                <input class="form-control" type="text"  name="location_name" value="{{ is_null($data->location_name) ? ' ': $data->location_name }}">
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