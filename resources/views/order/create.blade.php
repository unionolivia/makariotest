@extends('layouts.app')

@section('title', 'Add an Order')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add an Order</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
             
                 <label for="inputName">Order Information</label>
         <form method="POST" class="form-horizontal" action="{{ route('order.store') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
             
                <input type="text" name="order_no" id="order_no" value="{{$orderNo}}" placeholder="Order Number" readonly class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="user_id" id="user_id">
                   <option selected disabled>Customer</option>
                  @foreach($customers as $customer)
                     <option value="{{$customer->id}}">{{$customer->firstname}} {{$customer->surname}}</option>
                     @endforeach
                </select>
              </div>
                <!-- /.form-group -->
                
                
                 <div class="form-group">
                  <label>Due Date</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" id="due_date" name="due_date">
                  </div>
                  <!-- /.input group -->
                </div>
                                           
                 
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="category" id="category">
                <option selected disabled>Categories</option>
                  <option value="printing">Printing</option>
                  <option value="it">IT</option>  
                  <option value="other">others</option> 
                </select>
                </div>
                
                 <div class="form-group">
                
                <input type="text" name="name" id="name" placeholder="Job name" class="form-control">
                </div>
                
                 <div class="form-group">
                
                <input type="text" name="qty" id="qty" placeholder="Quantity" class="form-control">
                </div>
                
                 <div class="form-group">
               
                <select class="form-control custom-select" name="status" id="status">
                <option selected disabled>Job Status</option>
                  <option value="ongoing">Ongoing</option>
                  <option value="finished">finished</option>  
                  <option value="canceled">canceled</option> 
                </select>
                </div>
                
                
              </div>
              <!-- /.col -->             
            </div>
            
                        
            <label for="inputName">Payment Information</label>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="total_amount" name="total_amount" class="form-control" placeholder="Total Amount">
                </div>  
                 </div>
                 <!-- end col-6 -->
                 
                 <div class="col-md-6">
                 		<div class="form-group">   
                  <input type="text" name="amount_paid" id="amount_paid" class="form-control" placeholder="Amount Paid">
                </div>
                 </div>
                 
                 
                 <div class="col-md-6">
                 		<div class="form-group">   
                  <input type="text" name="comments" id="comments" class="form-control" placeholder="Comments">
                </div>
                 </div>
                 
              </div>
              
              <!-- end of Column -->
             
             
            <div class="form-group">
                 <input type="submit" value="Submit" class="btn btn-success float-right">
              </div> 
                
            </div>
              
             
              
              </div>
              
            </form>
                          
            </div>
            <!-- /.card-body -->
          </div>     
           </div>     <!-- /.card -->
         
        
          
        
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
       
  //Date range picker
    $('#due_date').datepicker({
       autoclose: true,
       format: 'dd-mm-yyyy'
    });
});
</script>
@endpush
