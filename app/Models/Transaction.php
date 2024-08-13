<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'transaction_code',
        'phone_number',
        'amount',
        'provider_id',
        'product_id',
        'category_id',
        'status',
        'total_price',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }


}
