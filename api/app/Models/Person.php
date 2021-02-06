<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Person extends Model
{
    /**
     * Name of table on database
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name'
    ];

    public function personTypes()
    {
        return $this->belongsToMany(PersonType::class, 'person_x_person_type', 
            'person_id', 'person_type_id')->withTimestamps()->as('type');
    }

    public function logins()
    {
        return $this->belongsToMany(Login::class, 'person_x_login', 'person_id',
            'login_id')->withTimestamps()->as('login');
    }

    public function operations()
    {
        $this->hasMany(Operation::class);
    }
}
