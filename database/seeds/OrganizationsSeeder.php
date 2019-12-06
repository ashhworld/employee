<?php

use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([[
            'name' => 'Super Organization',
            'address' => "Mumbai"
        ],[
            'name' => 'Testoutlook Solutions LLP',
            'address' => "Aurangabad"
        ],[
            'name' => 'Abhay Techsolutions LLP',
            'address' => "Mumbai"
        ]]);
    }
}
