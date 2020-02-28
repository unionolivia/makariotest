<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\User;
use URL;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users as u')
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'r.name as role', 'ru.role_id as roleid')
            ->get();
            
             $roles = Role::all();  
        return view('user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
              
           $profilePhoto = '';
           $newProfilePhoto = $request->file('profile_photo');
       
       if(!empty($newProfilePhoto)){
       
         $profilePhoto = $newProfilePhoto->getClientOriginalName();
         $destinationPath = public_path() . '/uploads/profile/';
         $newProfilePhoto->move($destinationPath, $profilePhoto);
       }
    	
         
    
          $user = new User;
          
        	$user->name = $request->username;
        	$user->surname = $request->lastname;
        	$user->firstname = $request->firstname;
        	$user->gender = $request->gender;
        	$user->address = $request->address;
        	$user->firstname = $request->firstname;
        	$user->phone = $request->phone;
        	$user->email = $request->email;
        	$user->profile_photo = $profilePhoto;
        	$user->password = bcrypt($request->password);
        	$user->company_address = $request->company_address;
        	$user->company_name = $request->company_name;
        	$user->guarantor_address = $request->guarantor_address;
        	$user->guarantor_name = $request->guarantor_name;
        	$user->created_by = $request->user()->id;
        	
        	$user->save();
        	
        	$role = Role::where('id', '=', $request->role)->firstOrFail();
          
          $user->attachRole($role->id);
            
            $data = [
        	   'name' => $user->firstname. ''. $user->surname,
        	   'password' => $request->password,
        	   'login_link' => URL::route('login'), 
        	
        	];
        	
        	Mail::send('emails.welcome', $data, function($message) use ($user){
        	    $message
        	    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        	    ->to($user->email, '')
        	    ->subject('Welcome to Makarioworks');
        	});
          
          
          return redirect()->route('user.index')->with('status', $request->firstname.' created as user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
            $user = DB::table('users as u')
            ->where('u.id', '=', $id)
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'r.name as role', 'ru.role_id as roleid')
            ->first();
            $roles = Role::all();
            
        return view('user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // For Profile Photo
       $profilePhoto = $request->hidden_image;
       $newProfilePhoto = $request->file('profile_photo');
       
       if(!empty($newProfilePhoto)){
       
         $profilePhoto = $newProfilePhoto->getClientOriginalName();
         $destinationPath = public_path() . '/uploads/profile/';
         $newProfilePhoto->move($destinationPath, $profilePhoto);
       }
       
       
        $user = User::find($id);     
          
        	$user->name = $request->username;
        	$user->lastname = $request->lastname;
        	$user->firstname = $request->firstname;
        	$user->gender = $request->gender;
        	$user->address = $request->address;
        	$user->firstname = $request->firstname;
        	$user->phone = $request->phone;
        	$user->email = $request->email;
        	$user->profile_photo = $profilePhoto;
        	$user->updated_by = $request->user()->id;
        	
        	 if($user->isDirty()){
          $user->save();
          return redirect()->route('user.index')->with('status', $request->lastname.' updated');
        }
        
        return redirect()->route('user.index')->with('status', 'You did not update any record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function updateRole(Request $request, $id)
    {
    
        $user = User::find($id);
        
        $role = $request->role;
        $user->updated_by = $request->user()->id;
        
       
         
        
        if($user->isDirty()){
          DB::table('role_user')->where('user_id', $id)->delete();
          $user->attachRole($role);
          $user->save();
          return redirect()->route('user.index')->with('status', 'Role updated');
        }
        
        return redirect()->route('user.index')->with('status', 'You did not update any record');
        
    }
    
    
}
