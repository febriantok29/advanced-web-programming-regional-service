<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regional extends Model
{
    use SoftDeletes;

    protected $table = 'm_regionals';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'regional_id');
    }
}
