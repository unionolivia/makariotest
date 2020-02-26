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
                  
                 
                  <td>Ijaodola Segun</td>
                  
                   
                  <td>gbagi</td>                                   
                  <td>2347084392212</td>
                   <td>bimbo@graceinvestement.com</td>
                  <td>Accountant</td> 
                  <td><div class="form-group">                        
                        <select class="form-control">
                          <option><label>Assigned As</label></option>
                          <option>Admin</option>
                          <option>Accountant</option>
                          <option>Area Officer</option>
                          <option>Sales Canvasing Officer</option>
                          <option>Group Supervisor</option>
                          <option>Zonal Coordinator</option>

                        </select>
                      </div>
                     <a href="staff.html" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                      </div></td>                 
                </tr>
                 <tr>
                 
                  
                  <td>Bimbo Stephen</td>
                                   
                  <td>Dugbe</td>                                   
                  <td>2347084392212</td>
                   <td>bimbo@graceinvestement.com</td>
                  <td>Sale Canvasing Officer- <a href="view-zone.html">Zone A</a></td> 
                  <td><div class="form-group">                        
                        <select class="form-control">
                          <option><label>Assigned As</label></option>
                          <option>Admin</option>
                          <option>Accountant</option>
                          <option>Area Officer</option>
                          <option>Sales Canvasing Officer</option>
                          <option>Group Supervisor</option>
                          <option>Zonal Coordinator</option>

                        </select>
                      </div>
                     <a href="staff.html" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div></td>                 
                </tr>
                <tr>
                 
                 
                  <td>Bayo olatunji</td>
                                     
                  <td>Dugbe</td>                                   
                  <td>2347084392212</td>
                   <td>bayo@graceinvestement.com</td>
                  <td>Area Officer- <a href="view-area.html">Area A</a></td> 
                  <td><div class="form-group">                        
                        <select class="form-control">
                          <option><label>Assigned As</label></option>
                          <option>Admin</option>
                          <option>Accountant</option>
                          <option>Area Officer</option>
                          <option>Sales Canvasing Officer</option>
                          <option>Group Supervisor</option>
                          <option>Zonal Coordinator</option>

                        </select>
                      </div>
                      <a href="staff.html" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
