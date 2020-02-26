@extends('layouts.app')

@section('title', 'Add a Staff')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Staff</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
             
                 <label for="inputName">Staff Information</label>
         <form method="POST" class="form-horizontal" action="{{ route('staff.store') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
             
                <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="role" id="role">
                   <option selected disabled>Job Role/Description</option>
                  @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                </select>
              </div>
                <!-- /.form-group -->
                
                 <div class="form-group">
                <select class="form-control custom-select" id="area" name="area">
                  <option selected disabled>Select Area</option>
                   @foreach($areas as $area)
                     <option value="{{$area->id}}">{{$area->name}}</option>
                     @endforeach
                </select>
              </div>
              
                 <div class="form-group">
                <select class="form-control custom-select" id="group" name="group">
                  <option selected disabled>Select Group</option>
                   @foreach($groups as $group)
                     <option value="{{$group->id}}">{{$group->name}}</option>
                     @endforeach
                </select>
              </div>
              
               <div class="form-group">
                <select class="form-control custom-select" id="group" name="group">
                  <option selected disabled>Select Zones</option>
                   @foreach($zones as $zone)
                     <option value="{{$zone->id}}">{{$zone->name}}</option>
                     @endforeach
                </select>
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
                  <input type="text" name="address" id="address" class="form-control" placeholder="Home Address">
                </div>
                
                 <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_photo" name="profile_photo" >
                        <label class="custom-file-label" for="profile_photo">Choose Staff photo</label>
                      </div>
                      
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                  <input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                </div>
                
              </div>
              <!-- /.col -->             
            </div>
             
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
              <div class="col-md-6">
              
              <?php
								function generatePassword ($length = 8)
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

								
								 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Password" name="password" id="password">
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
<!-- date-range-picker -->
<script src="{{ asset('js/moment.min.js') }}"></script>

<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
<script>
 $(function() {

bsCustomFileInput.init();         

});
</script>
@endpush
