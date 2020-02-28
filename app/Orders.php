<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     public function getNextOrderNumber(){
  
        $lastOrderNumber = Orders::orderBy('created_at','DESC')->first();
        if (empty($lastOrderNumber->order_no)) {
          $orderNo = 'MAK-'.date('Y').'-00001';
          return $orderNo;
        }
        $lastOrderNo = substr($lastOrderNumber->order_no, 9);
        $orderNo = 'MAK-'.date('Y').'-'.str_pad($lastOrderNo + 1, 5, "0", STR_PAD_LEFT);
        
        return $orderNo;
 }
 
}
