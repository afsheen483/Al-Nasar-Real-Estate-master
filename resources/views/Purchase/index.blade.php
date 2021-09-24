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
              
                
                @if (request()->date || request()->to_date || request()->from_date)
                <div class="" style="margin-left: 1.45%">
                    <form action="{{ url('purchase_date_search') }}" action="get">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label for="">To Date</label>
                                 <input type="date" name="to_date" id="" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for="">End Date</label>
                                <input type="date" name="from_date" id="" class="form-control">
                           </div>
                            <div class="col-2" style="margin-top: 2%">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                @endif
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>ClientName</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>Sale Amount</th>
                        <th>Paid Amount</th>
                        <th>Witness 1 Name</th>
                        <th>Witness 1 CNIC</th>
                        <th>Witness 2 Name</th>
                        <th>Witness 2 CNIC</th>
                        <th>Description</th>
                        <th data-priority="-1">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                           <tr>
                            <td>{{ $data->client_name }}</td>
                            <td>{{ $data->date }}</td>
                            <td><a href="{{ $data->file }}" target="blank">{{ $data->file }}</a></td>
                            <td>{{ $data->sale_amount }}</td>
                            <td>{{ $data->paid_amount }}</td>
                            <td>{{ $data->witness_name_1 }}</td>
                            <td>{{ $data->witness_cnic_1 }}</td>
                            <td>{{ $data->witness_name_2 }}</td>
                            <td>{{ $data->witness_cnic_2 }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <a href="{{ url('purchase_form',['id'=>$data->id]) }}" style="color: blue;cursor: pointer;"><i class="fa fa-edit"></i></a> | 
                                <a  style="color: rgb(245, 94, 94);cursor: pointer;" class="delete_btn" id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
                            </td>   
                           </tr>
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
           // alert("delete");
          var delete_id = $(this).attr("id");
          var th=$(this);
          console.log(delete_id);
          var url = "{{url('purchase_delete')}}/"+delete_id;
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