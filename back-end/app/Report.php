<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $table = 'reports';

    public $timestamps = true;

    public function scopeSearch($query, $search)
    {
        if ($search)
            return $query->where('name', 'LIKE', "%$search%");
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function scopeSearchUser($query, $user)
    {
        if ($user)
            return $query->where('id_user', '=', $user);
    }
}
