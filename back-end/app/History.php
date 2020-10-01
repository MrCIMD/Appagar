<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use SoftDeletes;

    protected $table = 'histories';

    public $timestamps = true;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function scopeSearchUser($query, $user)
    {
        if ($user)
            return $query->where('id_user', '=', $user);
    }

    public function service()
    {
        return $this->hasOne('App\Service', 'id', 'id_service');
    }

    public function scopeSearchService($query, $service)
    {
        if ($service)
            return $query->where('id_service', '=', $service);
    }

    public function action()
    {
        return $this->hasOne('App\Action', 'id', 'id_action');
    }

    public function scopeSearchAction($query, $action)
    {
        if ($action)
            return $query->where('id_action', '=', $action);
    }

    public function ticket()
    {
        return $this->hasOne('App\Ticket', 'id', 'id_ticket');
    }

    public function scopeSearchTicket($query, $ticket)
    {
        if ($ticket)
            return $query->where('id_ticket', '=', $ticket);
    }
}
