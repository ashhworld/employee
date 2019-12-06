<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'organization_id' => 1,  
            'role_id' => 1,  
            'full_name' => "Admin",  
            'mobile_no' => "9999999999",  
            'email_id' => "admin@gmail.com",  
            'password' => "020da6fda07cbd85d0e544fa08bc544d",  
            'salary' => 0,  
            'age' => 0,  
            'gender' => "male",  
            'address' => "Mumbai",  
            'is_active' => 1, 
            'created_at' => date('Y-d-m H:i:s')
        ]);
    }
}
