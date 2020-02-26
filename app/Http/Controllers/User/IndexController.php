<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = DB::table('users as u')
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'r.name as role', 'ru.role_id as roleid')
            ->get();
            
             $roles = Role::all();  
        return view('user.index', compact('staffs', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $areas = Area::all();
        $groups = Group::all();
        $zones = Zone::all();
        
        return view('user.create', compact('roles', 'areas', 'groups', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
      
      
       // dd($request->all());
        // For Customer Signature
         if (!$request->hasFile('profile_photo')) {
         return response()->json(['upload_file_not_found'], 404);
         }  
         $image = $request->file('profile_photo');
         if(!$image->isValid()) {
           return response()->json(['invalid_file_upload'], 404);
          }

         $profilePhoto = $image->getClientOriginalName();
         $destinationPath = public_path() . '/uploads/profile/';
         $image->move($destinationPath, $profilePhoto);
         
         
    
          $user = new User;
          
        	$user->name = $request->username;
        	$user->lastname = $request->lastname;
        	$user->firstname = $request->firstname;
        	$user->area_id = $request->area;
        	$user->group_id = $request->group;
        	$user->zone_id = $request->zone;
        	$user->gender = $request->gender;
        	$user->address = $request->address;
        	$user->firstname = $request->firstname;
        	$user->phone = $request->phone;
        	$user->email = $request->email;
        	$user->profile_photo = $profilePhoto;
        	$user->password = bcrypt($request->password);
        	$user->created_by = $request->user()->id;
        	
        	$user->save();
        	
        	$role = Role::where('id', '=', $request->role)->firstOrFail();
          $user->attachRole($role->id);

        	
          return redirect()->route('staff.index')->with('status', $request->firstname.' created as staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
            $staff = DB::table('users as u')
            ->where('u.id', '=', $id)
           ->leftjoin('areas as a', 'u.area_id', '=', 'a.id')
           ->leftjoin('groups as g', 'u.group_id', '=', 'g.id')
           ->leftjoin('zones as z', 'u.zone_id', '=', 'z.id')
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'r.name as role', 'ru.role_id as roleid', 'a.name as area', 'g.name as group', 'z.name as zone')
            ->first();
            $roles = Role::all();
            $areas = Area::all();
            $groups = Group::all();
            $zones = Zone::all();
            
        return view('user.show', compact('staff', 'areas', 'groups', 'zones', 'roles'));
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
          return redirect()->route('staff.index')->with('status', $request->lastname.' updated');
        }
        
        return redirect()->route('staff.index')->with('status', 'You did not update any record');
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
        $user->area_id = $request->area;
        $user->group_id = $request->group;
        $user->zone_id = $request->zone;
        $user->updated_by = $request->user()->id;
        
       
         
        
        if($user->isDirty()){
          DB::table('role_user')->where('user_id', $id)->delete();
          $user->attachRole($role);
          $user->save();
          return redirect()->route('staff.index')->with('status', 'Role updated');
        }
        
        return redirect()->route('staff.index')->with('status', 'You did not update any record');
        
    }
    
    
}
