<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PersonType;
use Illuminate\Database\Seeder;

class PersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 
                'name' => 'Pessoa Física',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 
                'name' => 'Pessoa Jurídica',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        (new PersonType())->insert($data);
    }
}
