<?php

namespace iService;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nivelacesso_id', 'situacao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAreasAtendimento()
    {
       return $this->belongsToMany('iService\AreaAtendimento', 'users_areas_atendimento')->where('areas_atendimento.situacao', '=', 1)->distinct('user_id');
    }
    
}
