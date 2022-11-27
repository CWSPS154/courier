<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Customer;
use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '7894561230',
            'password' => Hash::make('admin@123'),
            'role_id' => Role::ADMIN
        ]);

        $customer_id=User::create( [
            'name'=>'Hanna Jose',
            'first_name'=>'Hanna',
            'last_name'=>'Jose',
            'email'=>'chris+1@mello.co.nz',
            'mobile'=>'022222',
            'email_verified_at'=>NULL,
            'password'=>Hash::make('customer@123'),
            'remember_token'=>NULL,
            'is_admin'=>0,
            'is_active'=>1,
            'role_id'=>Role::CUSTOMER
        ] )->id;

        Customer::create( [
            'user_id'=>$customer_id,
            'customer_id'=>'XYZ111',
            'company_name'=>'MERZ Construction Products',
            'area_id'=>5
        ] );

        $driver_id=User::create( [
            'name'=>'Farro Tia',
            'first_name'=>'Farro',
            'last_name'=>'Tia',
            'email'=>'chris+4@mello.co.nz',
            'mobile'=>'321654987',
            'email_verified_at'=>NULL,
            'password'=>Hash::make('driver@123'),
            'remember_token'=>NULL,
            'is_admin'=>0,
            'is_active'=>1,
            'role_id'=>Role::DRIVER
        ] )->id;

        Driver::create( [
            'user_id'=>$driver_id,
            'driver_id'=>'DRI1111',
            'area_id'=>5,
            'pager_number'=>NULL,
            'company_email'=>NULL,
            'company_driver'=>0
        ] );
    }
}
