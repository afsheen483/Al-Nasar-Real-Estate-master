@extends('layouts.master')

@section('title')
Ledger
@endsection

@section('headername')
Ledger
@endsection

@section('content')
<div class="form-group">
    <form action="{{ url('get_client') }}" method="get">
        @csrf
    <div class="row">
        <div class="col-3">
           
            <select name="client_id" id="client_id" class="form-control">
                <option value="">Select Client</option>
                @foreach ($client_array as $array)
                <option value="{{ $array->id }}">{{ $array->client_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
           <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>
           </button>
        </div>
    </div>
    </form>
        <div class="col-3">
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModalLong"
                id="cash_in">CASH IN</button>
            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModalLong"
                id="cash_out">CASH OUT</button>
        </div>
    </div>
</div>
<!-- Modal -->
<form action="/save_transaction" method="POST">
    @csrf
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="g" name="id" hidden>
                    <input type="text" name="ledger_id" id="ledger_id" hidden>


                    <label>Amount</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="credit" name="amount" value="">
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="credit" name="desc" value="">
                    </div>
                    <label>Date</label>
                    <div class="form-group">
                        <input class="form-control" type="date" id="credit" name="date" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


{{-- Main Content --}}
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="" style="font-size:15px">Total Debit : </label>
                            <span class="debit_total"></span>
                        </div>
                        <div class="form-group">
                            <label for="" style="font-size:15px">Total Credit : </label>
                            <span class="credit_total"></span>
                        </div>
                        <div class="form-group">
                            <label for="" style="font-size:15px">Balance : </label>
                            <span class="balance"></span>
                        </div>
                    </div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            {{-- <th>Name</th> --}}
                            <th>Date</th>
                            <th>Description</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                       @if (request()->client_id)
                       @foreach ($data as $data)
                       <tr data-id="{{ $data->id }}">
                        <td class="a">{{ $data->date }}</td>
                        <td class="b">{{ $data->description }}</td>
                        <td class="c debit" id="debit_{{ $data->id }}">{{ $data->debit_card }}</td>
                        <td class="d credit" id="credit_{{ $data->id }}">{{ $data->credit_card }}</td>
                        <td class="e">{{ $data->open_balance }}</td>
                       </tr>
                       {{-- <td class="f"></td> --}}
                       {{-- <td>
                           <a href="{{ url('create_phas',['id'=>0]) }}" style="color: blue;cursor:
                           pointer;"><i class="fa fa-edit"></i></a>
                         
                       </td> --}}
                       @endforeach
                       @else
                       <td class="a"></td>
                       <td class="b"></td>
                       <td class="c debit"></td>
                       <td class="d credit"></td>
                       <td class="e"></td>
                       @endif

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

//         $("#client_id").on("change",function(){
//                 var id = $(this).val();
//                 var url = "{{url('get_client')}}";
//                 $.ajax({
                      
//                       url : url,
//                       type : 'GET',
//                       cache: false,
//                       data: {_token:'{{ csrf_token() }}',
//                       id:id,
//                       },

//                       success:function(datas){
//                         //console.log(data);
//                         var i;
// for (i = 0; i < data.length; ++i) {
//      $(".a").text(data.date);
//                         $(".b").text(data.description);
//                         $(".c").text(data.debit_card);
//                         $(".d").text(data.credit_card);
//                         $(".e").text(data.open_balance);
//                         $(".g").val(data.client_id);
// }
//                         $.each(datas , function(index, data) { 
//                         console.log(index, data)
                        
// });
                        
                       
//                       }
//                       });
//             });

            jQuery(':button').click(function () {
    if (this.id == 'cash_in') {
        var cash_in = 1;
                $('#ledger_id').val(cash_in);
                $('#exampleModalLongTitle').text('New Cash In');
    }
    else if (this.id == 'cash_out') {
        $('#ledger_id').val("");
                var cash_out = 0;
                $('#ledger_id').val(cash_out);
                $('#exampleModalLongTitle').text('New Cash Out');
    }
});


var sum = 0;
            $(".debit").each(function(){
                var val = $(this).text();
                console.log(val);
                sum += Number(val);
            });
            console.log(sum);
            $(".debit_total").text(sum.toFixed(2));

            var sum2 = 0;
            $(".credit").each(function(){
                var val2 = $(this).text();
                console.log(val2);
                sum2+= Number(val2);
            });
            //console.log(sum2);
            var balance = Number(sum) - Number(sum2);
            $(".credit_total").text(sum2.toFixed(2));
            $(".balance").text(balance.toFixed(2));
       });

</script>
@endsection