<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
    /**
     * Name of table on database
     *
     * @var string
     */
    protected $table = 'person_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function persons()
    {
        $this->belongsToMany(Person::class, 'person_x_person_type', 'person_type_id', 'person_id');
    }
}