<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Role::create([
            'name' => 'Customer',
            'slug' => 'customer',
            'permissions' => [
                'create-order' => true,
            ]
        ]);
        $employee = Role::create([
            'name' => 'Employee',
            'slug' => 'employee',
            'permissions' => [
                'update-order' => true,
                'complete-order' => true,
            ]
        ]);
    }
}
