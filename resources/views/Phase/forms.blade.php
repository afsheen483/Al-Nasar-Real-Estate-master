@extends('layouts.master')

@section('title')
    Create Phase
@endsection

@section('headername')
    Phase
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Create Phase</h4>
                <br>
               
              @if (request()->id > 0)
                     <form action="{{ url('phase_update',['id'=>$data->id]) }}" id="form" method="POST">
                        @csrf
                        @method('PUT')
              @else
              <form action="{{ url('phase_insert') }}" id="form" method="POST">
                @csrf
              @endif
                <div class="container" style="margin-left:10%">
                    <div class="row">
                        <div class="col-3">
                            <label>Phase name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter phase name here" name="phase_name" value="{{ (is_null($data->phase_name) ? '' : $data->phase_name) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Location name</label>
                            <div class="form-group">
                                <select name="location_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($location_array as $location)
                                    @if ($data->location_id == $location->id)
                                        <option value="{{ $location->id }}" selected>{{ $location->location_name }}</option>
                                    @else
                                         <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
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