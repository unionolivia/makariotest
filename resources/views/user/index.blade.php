@extends('layouts.app')

@section('title', 'Users')
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
            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
			@endif	 
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
                
                 @if(empty($users))
									 <tr>
                      <td>No users</td>
                    </tr>                                      
								@else
                @foreach($users as $user) 
               
                <tr>
                  <td>{{$user->firstname}} {{$user->surname}}</td>                   
                  <td>{{$user->address}}</td>                                   
                  <td>{{$user->phone}}</td>
                   <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td> 
                  <td><a href="" data-toggle="modal" data-target="#modal-" class="btn btn-info">update role<i class="fas fa-edit"></i></a>
                        
                         {{csrf_field()}}
                         {{method_field('DELETE')}}
                 
                     <a href="staff.html" class="btn btn-success">update user<i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger">Delete user<i class="fas fa-trash"></i></a>

                      </div></td>                 
                </tr>
                
                 @endforeach
                  @endif
                  
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
