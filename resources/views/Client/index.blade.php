@extends('layouts.master')

@section('title')
    Client
@endsection

@section('headername')
    Client
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Open Balance</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <td>{{ $data->client_name }}</td>
                            <td>{{ $data->contact }}</td>
                            <td>{{ $data->cnic }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->location_name }}</td>
                            <td>{{ $data->open_balance }}</td>
                            <td>{{ $data->type }}</td>
                            <td>
                                <a href="{{ url('create_phase',['id'=>$data->id]) }}" style="color: blue;cursor: pointer;"><i class="fa fa-edit"></i></a> | 
                                <a  style="color: red;cursor: pointer;" class="delete_btn" id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
                            </td> 
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> 



@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       $(document).ready(function(){
        $('.delete_btn').on('click',function () {
          var delete_id = $(this).attr("id");
          var th=$(this);
          console.log(delete_id);
          var url = "{{url('client_delete')}}/"+delete_id;
          Swal.fire({
							  title: 'Are you sure?',
							  text: "You won't be able to revert this!",
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yes, delete it!'
							}).then(function(result){
                if (result.isConfirmed)  
                  {
                      $.ajax({
                      
                        url : url,
                        type : 'PUT',
                        cache: false,
                        data: {_token:'{{ csrf_token() }}'},
                        success:function(data){
                         if (data == 1) {
                          Swal.fire({
                                title:'Deleted!',
                                text:'Your file and data has been deleted.',
                                type: 'success',
                              })
                              th.parents('tr').hide();

                            }
                          else{
                                Swal.fire({
                                    title: 'Oopps!',
                                    text: "something went wrong!",
                                    type: 'warning',
                          			})
                          		}
                         }
                        
                        });
                }
              });
               
        });

       });
    </script>
@endsection