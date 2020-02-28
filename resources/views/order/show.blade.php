@extends('layouts.app')

@section('title', 'Staff Profile')
@section('content')

           <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('uploads/profile/'.$staff->profile_photo)}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $staff->firstname}}  {{ $staff->lastname}}</h3>
                <p class="text-muted text-center">{{ $staff->role}} </p>



                
                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Zone</b> <a class="float-right">{{ $staff->zone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Group</b> <a class="float-right">{{ $staff->group}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Area</b> <a class="float-right">{{ $staff->area}}</a>
                  </li>


                  
                </ul>

                <a href="account.html" class="btn btn-primary btn-block"><b>Open Account</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#about-member" data-toggle="tab">About Staff</a></li>
                 
                  <li class="nav-item"><a class="nav-link" href="#edit-member" data-toggle="tab">Edit Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="about-member">
                    
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope mr-1"></i> Email Address</strong>

                <p class="text-muted">
                 {{ $staff->email}}
                </p>
                <hr>
                
                <strong><i class="fas fa-phone mr-1"></i>Phone number</strong>
                <p class="text-muted">{{ $staff->phone}}</p>
                <hr>

                
                <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>

                <p class="text-muted">
                {{ $staff->address}}
                </p>
                <hr>
                               
                <strong><i class="fas fa-user mr-1"></i>Gender</strong>

                <p class="text-muted">
                {{ $staff->gender}}
                </p>

                     

                
              </div>
              


              <!-- /.card-body -->
            </div>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="edit-member">
                    
                     <div class="card-body">
             
                 <label for="inputName">Staff Information</label>
           <form class="form-horizontal" method="POST" id="form-{{$staff->id}}" enctype="multipart/form-data" action="{{ route('staff.update', $staff->id) }}">
              				  {{csrf_field()}}
                        {{method_field('PATCH')}}
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
             
                <input type="text" id="firstname" name="firstname" value="{{$staff->firstname}}" placeholder="First Name" value="Bayo" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" id="role" name="role">
                  <option  selected disabled>Job Role/Description</option>
                  @foreach($roles as $role)
         				<option <?php if ($staff->roleid == $role->id) { echo "selected"; } ?> value="{{ $role->id }}">{{ $role->name }}</option>
         			
      			   @endforeach 
                </select>
              </div>
                <!-- /.form-group -->
                <div class="form-group">
                   
                 @if ($staff->profile_photo)
                 <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('uploads/profile/'.$staff->profile_photo)}}" alt="User profile picture">
                </div>
                @else
                <p> No image found </p>
                @endif     
                    <div class="input-group">
                      <div class="custom-file">
                         <input type="file" class="custom-file-input" id="profile_photo" name="profile_photo">
                        <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $staff->profile_photo }}" />
                        <label class="custom-file-label" for="profile_photo">Choose Staff photo</label>
                      </div>
                      
                    </div>
                  </div>
                  
                  <div class="form-group">
                  <input type="phone" name="phone" id="phone" class="form-control" value="{{$staff->phone}}" placeholder="Phone Number">
                </div>
                 
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
               <input type="text" id="lastname" name="lastname" value="{{$staff->lastname}}" placeholder="Last Name"  class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
               
                <select class="form-control custom-select" name="gender" id="gender">
                   <option <?php if ($staff->gender == "male") { echo "selected"; } ?> value="male">Male</option>
                  <option  <?php if ($staff->gender == "female") { echo "selected"; } ?> value="female">Female</option>
                                          
                </select>
                </div>
                <div class="form-group">
                  <input type="email" id="email" name="email" value="{{ $staff->email}}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                   <input type="text" id="address" placeholder="Address" name="address" value="{{$staff->address}}" class="form-control">
                </div>
              </div>
              <!-- /.col -->             
            </div>
             
            <label for="inputName">User Account Settings</label>
            <div class="row">
              <div class="col-md-6">
                              

                              
                <div class="input-group mb-3">
              <input type="text" id="username" placeholder="Address" name="username" value="{{$staff->name}}" class="form-control">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
           
                


        
              </div>
              <!-- /.col -->
              <div class="col-md-6">


                <div class="input-group mb-3">
              <input type="text" id="email" placeholder="Address" name="email" value="{{$staff->email}}" class="form-control">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

                

            <div class="form-group">
                 <input type="submit" value="Update" onclick="$('#form-{{$staff->id}}').submit();" class="btn btn-success float-right">
              </div> 
                
            </div>
              
             
              
              </div>
              
            </form>
                          
            </div>
                
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
