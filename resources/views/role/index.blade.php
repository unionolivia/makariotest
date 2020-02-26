@extends('layouts.app')

@section('title', 'Roles')
@section('content')
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Role</h3>
            
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
             <form method="POST" action="{{ route('role.store') }}">
                        {{ csrf_field() }}
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="1"></textarea>
              </div>             
              
             
              <div class="form-group">
                 <input type="submit" value="Submit" class="btn btn-success float-right">
              </div>          
              </form>    
            </div>
            <!-- /.card-body -->
          </div>     
           </div>     <!-- /.card -->
          <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">View Roles</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <table id="role" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Role Name</th>
                  <th>Description</th>                  

                 
                </tr>
                </thead>
                <tbody>
                
                 @if(empty($roles))
									 <tr>
                      <td>No roles</td>
                    </tr>                                      
								@else
                
                 @foreach($roles as $role) 
                    <tr>
                      <td>{{$role->name}}</td>
                      <td>{{$role->description}}</td>
                      
                    </tr>                   
                    @endforeach
                  @endif          
                
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Role Name</th>
                  <th>Description</th>                  

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

@endsection

@push('scripts')
<script>
 $(function() {
 
 
      $('#role').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

});
</script>
@endpush
