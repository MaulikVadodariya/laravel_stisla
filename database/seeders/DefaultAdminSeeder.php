<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultAdminData = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ];

        $adminExist = User::where('email',$defaultAdminData['email'])->exists();
        
        if(! $adminExist){
            User::create($defaultAdminData);
        }
      
    }
}
