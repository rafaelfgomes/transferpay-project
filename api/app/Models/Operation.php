<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    /**
     * Name of table on database
     *
     * @var string
     */
    protected $table = 'operations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'payer', 'payee', 'person_id'
    ];

    public function person()
    {
        $this->belongsTo(Person::class);
    }

}