<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoices extends Model
{
     use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'order_date',
        'order_receiver_address',
        'order_total_before_tax',
        'order_total_tax',
        'order_tax_per',
        'order_amount_paid',
        'order_total_amount_due',
        'pay_with',
        'paid_on',
        'paid',
        'user_id',
        'notes',
        'created_on',
        'order_total_after_tax',
    ];
    // public function items():HasMany
    // {
    //   return $this->hasMany(InvoiceOrderItem::class ,'invoice_id','id');
    // }

    // public function users()
    // {
    //     return $this->belongsTo(User::class,'user_id' ,'id');
    // }

    // public function Touserid()
    // {
    //     return $this->belongsTo(User::class,'to_userid' ,'id');
    // }

    // public function userOrder()
    // {
    //   return $this->hasMany(UserOrders::class ,'invoice_id','id');
    // }

}
