@extends('layouts.app')

@section('title', 'Staff')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
             <!-- /.card -->
          <div class="col-md-12 col-sm-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">All Users</h3>
              
              <a href="{{route('user.create')}}" class="btn btn-info">Add a user<i class="fas fa-edit"></i></a>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  
                  <th>Full Name</th>
                                   
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Role</th>
                  <th>Actions</th>

                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>fumi bright</td>                   
                  <td>lekki</td>                                   
                  <td>2347084392212</td>
                   <td>fun@grinsy.com</td>
                  <td>Customer</td> 
                  <td><a href="" data-toggle="modal" data-target="#modal-" class="btn btn-info">update role<i class="fas fa-edit"></i></a>
                        
                         {{csrf_field()}}
                         {{method_field('DELETE')}}
                 
                     <a href="staff.html" class="btn btn-success">update user<i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger">Delete user<i class="fas fa-trash"></i></a>

                      </div></td>                 
                </tr>
                <tr>
                  <td>sunky tomi</td>                   
                  <td>lekki</td>                                   
                  <td>2347084392212</td>
                   <td>fun@grinsy.com</td>
                  <td>Customer</td> 
                  <td><a href="" data-toggle="modal" data-target="#modal-" class="btn btn-info">update role<i class="fas fa-edit"></i></a>
                        
                         {{csrf_field()}}
                         {{method_field('DELETE')}}
                 
                     <a href="staff.html" class="btn btn-success">update user<i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger">Delete user<i class="fas fa-trash"></i></a>

                      </div></td>                 
                </tr>
                </tbody>
                <tfoot>
                <tr>
                
                  
                  <th>Full Name</th>
                                
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Role</th>
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
      $('#user').DataTable({
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
