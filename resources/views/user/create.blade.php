@extends('layouts.app')

@section('title', 'Add a User')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add a User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
             
                 <label for="inputName">General Information</label>
         <form method="POST" class="form-horizontal" action="{{ route('user.store') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
             
                <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="role" id="role">
                   <option selected disabled>Role</option>
                  @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                </select>
              </div>
                <!-- /.form-group -->
                
                
              <div class="form-group">   
                  <input type="text" name="address" id="address" class="form-control" placeholder="Home Address">
                </div>
                
                 <div class="form-group">
                 <input type="file" class="custom-file-" id="profile_photo" name="profile_photo" >
                    
                  </div>
                                
                 
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                
                <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="gender" id="gender">
                <option selected disabled>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>  
                </select>
                </div>
                
                 
                  <div class="form-group">
                  <input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                </div>  
                
                
              </div>
              <!-- /.col -->             
            </div>
            
            <label for="inputName">Staff Information</label>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="guarantor_name" name="guarantor_name" class="form-control" placeholder="Guarantor Name">
                </div>  
                 </div>
                 <!-- end col-6 -->
                 
                 <div class="col-md-6">
                 		<div class="form-group">   
                  <input type="text" name="guarantor_address" id="guarantor_address" class="form-control" placeholder="Guarantor Address">
                </div>
                 </div>
              </div>
              <!-- end of Column -->
            
            <label for="inputName">Customer Information</label>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name">
                </div>  
                 </div>
                 <!-- end col-6 -->
                 
                 <div class="col-md-6">
                 		<div class="form-group">   
                  <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address">
                </div>
                 </div>
              </div>
              <!-- end of Column -->
             
            <label for="inputName">User Account Settings</label>
            <div class="row">
              <div class="col-md-6">
                              
                <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Username" name="username" id="username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" id="email" name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
                


        
              </div>
              <!-- /.col -->
                <?php
								function generatePassword ($length = 6)
								{
									$genpassword = "";
									$possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
									$i = 0;
									while ($i < $length) {
										$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
										if (!strstr($genpassword, $char)) {
											$genpassword .= $char;
											$i++;
										}
									}
									return $genpassword;
								}
              ?>
              <div class="col-md-6">
              
								 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Password" value="<?php echo generatePassword(); ?>" name="password" id="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
             
             
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
       

});
</script>
@endpush
