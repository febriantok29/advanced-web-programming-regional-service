<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Master\Regional;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'master_customers';

    protected $fillable = [
        'name',
        'date_of_birth',
        'username',
        'region_id'
    ];

    public function region()
    {
        return $this->belongsTo(Regional::class, 'region_id');
    }
}
