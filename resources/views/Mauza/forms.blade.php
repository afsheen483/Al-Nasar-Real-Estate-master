@extends('layouts.master')

@section('title')
    Create Mauza
@endsection

@section('headername')
    Mauza
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Mauza</h4>
                <br>
                 
        @if (request()->id > 0)
                <form action="{{ url('mauza_update',['id'=>$data->id]) }}" id="form" method="POST">
                   @csrf
                   @method('PUT')
        @else
         <form action="{{ url('mauza_insert') }}" id="form" method="POST">
           @csrf
        @endif
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Mauza name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter mauza name here" name="mauza_name" value="{{ is_null($data->mauza_name) ? '' : $data->mauza_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Phase name</label>
                            <div class="form-group">
                                <select name="phase_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($phase_array as $array)
                                        @if ($data->phase_id == $array->id)
                                            <option value="{{ $array->id }}" selected>{{ $array->phase_name }}</option>
                                        @else
                                            <option value="{{ $array->id }}" >{{ $array->phase_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#clear").click(function(){
            $("#form")[0].reset();
});
        });
    </script>
@endsection