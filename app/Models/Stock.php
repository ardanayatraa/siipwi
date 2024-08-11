<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'category',
        'kode',
        'keterangan',
        'harga',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
