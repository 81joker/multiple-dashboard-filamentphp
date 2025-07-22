<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceOrderItem extends Model
{
     use HasFactory;
    // protected $table = 'invoice_order_items';

    protected $fillable = [
        'invoice_id',
        'item_code',
        'item_name',
        'product_id',
        'quantity',
        'price',
        'final_amount'
    ];
    // public function invoices():BelongsTo
    // {
    //     return $this->belongsTo(Invoices::class,'invoice_id' ,'id');
    // }

    // public function products()
    // {
    //     return $this->belongsTo(Product::class,'product_id' ,'id');
    // }
}
