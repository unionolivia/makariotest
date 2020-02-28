<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\User;
use App\Orders;
use App\Payments;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders as o')
           ->leftjoin('users as u', 'u.id', '=', 'o.user_id')
           ->leftjoin('payments as p', 'o.id', '=', 'p.order_id')
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'o.*', 'p.*', 'r.name as role', 'ru.role_id as roleid')
            ->get();
            
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $customers = DB::table('users as u')
            ->where('r.name', '=', 'customer')
           ->leftjoin('role_user as ru', 'u.id', '=', 'ru.user_id')
           ->leftjoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.*', 'r.name as role', 'ru.role_id as roleid')
            ->get();
            
          $orders = new Orders;
          $orderNo = $orders->getNextOrderNumber();
        
        return view('order.create', compact('roles', 'customers', 'orderNo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
          $order = new Orders;
          
        	$order->order_no = $request->order_no;
        	$order->user_id = $request->user_id;
        	$order->due_date = $request->due_date;
        	$order->category = $request->category;
        	$order->name = $request->name;
        	$order->qty = $request->qty;
        	$order->status = $request->status;
        	$order->total_amount = $request->total_amount;
        	$order->amount_paid = $request->amount_paid;
        	$order->comments = $request->comments;
        	$order->created_by = $request->user()->id;
        	        	
        	if($order->save()){
        	
        	$payment = new Payments;
        	$payment->order_id = $order->id;
        	$payment->amount = $order->amount_paid;
        	$payment->created_by = $request->user()->id;
        	
        	$payment->save();
        	
        	
        	$totalAmt = $order->total_amount - $payment->amount;
        	
        	$customer = User::where('id', $request->user_id)->first();
        	
        	
        	$data = [
        	   'name' => $customer->firstname. ''. $customer->surname,
        	   'job_name' => $order->name,
        	   'total_amount' => $order->total_amount,
        	   'amount_paid' => $payment->amount
        	
        	];
        	
        	Mail::send('emails.myorder', $data, function($message) use ($customer){
        	    $message
        	    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        	    ->to($customer->email, '')
        	    ->subject('Order Purchase from Makario');
        	});
        	
        	 return redirect()->route('order.index')->with('status', 'Customer has '. $totalAmt.' as balance');
        	
         }
          
         
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
