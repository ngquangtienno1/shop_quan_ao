
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\DashboardFactory> */
    use HasFactory;


    protected $fillable = [
        'name','category_id','gia_nhap','gia_ban','stock'
    ];

    protected $table = 'products';
}
