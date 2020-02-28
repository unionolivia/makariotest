@extends('layouts.app')

@section('title', 'Orders')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
             <!-- /.card -->
          <div class="col-md-12 col-sm-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">All orders</h3>
              
              <a href="{{route('order.create')}}" class="btn btn-info">Add an Order</a>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
			@endif	 
                <table id="order" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  
                  <th>Full Name</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Order Amount</th>
                  <th>Balance</th>
                  <th>Actions</th>

                 
                </tr>
                </thead>
                <tbody>
                
                 @if(empty($orders))
									 <tr>
                      <td>No Orders</td>
                    </tr>                                      
								@else
                @foreach($orders as $order) 
               
                <tr>
                  <td>{{$order->firstname}} {{$order->surname}}</td>                   
                  <td>{{$order->name}}</td>                                   
                  <td>{{$order->category}}</td>
                  <td>{{$order->qty}}</td>
                   <td>{{$order->total_amount}}</td>
                  <td>{{$order->amount_paid}}</td> 
                  <td><a href="" data-toggle="modal" data-target="#modal-" class="btn btn-info">update<i class="fas fa-edit"></i></a>
                        
                         {{csrf_field()}}
                         {{method_field('DELETE')}}
                 
                        <a href="#" class="btn btn-danger">Delete<i class="fas fa-trash"></i></a>

                      </div></td>                 
                </tr>
                
                 @endforeach
                  @endif
                  
                </tbody>
                <tfoot>
                <tr>
                 <th>Full Name</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Order Amount</th>
                  <th>Balance</th>
                  <th>Actions</th>
                   </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>         
        </div>

        
          
        
        <div class="row">
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        
            <!-- /.card -->
            
        <!-- /.row -->
      </div><!--/. container-fluid -->       
        </div>

        
          
        
        <div class="row">
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        
            <!-- /.card -->
            
        <!-- /.row -->
      </div><!--/. container-fluid -->
@endsection
@push('scripts')
<script>
 $(function() {
      $('#order').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

 });
</script>
@endpush
