<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Master\Regional;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'm_customers';

    protected $fillable = [
        'regional_id',
        'name',
        'code',
        'address',
        'phone',
        'email',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id');
    }
}
