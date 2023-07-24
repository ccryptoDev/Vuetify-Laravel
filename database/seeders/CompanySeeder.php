<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Status;
use Illuminate\Support\Arr;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appDomain = env('APP_DOMAIN');
        $sysUser = User::firstWhere('email', "sys@{$appDomain}");
        $statuses = Status::get()->pluck('id')->toArray();
        $password = Hash::make('password');
        Company::factory()->count(1)->create()->each(function($company) use($statuses, $password, $sysUser){

            $company->website = 'https://www.google.com';
            $company->logo = null;
            $company->status_id = Arr::random($statuses);
            $company->user_id = $sysUser->id;
            $company->save();


            $role_company_admin = Role::firstWhere('name', 'company-admin');
            User::factory()->count(1)->create()->each(function($user) use($statuses, $password, $role_company_admin, $company){
                $user->password = $password;
                $user->status_id = 1;
                $user->company_id = $company->id;
                $user->save();
                $user->assignRole($role_company_admin);
            });

            $role_hr = Role::firstWhere('name', 'hr-admin');
            User::factory()->count(1)->create()->each(function($user) use($statuses, $password, $role_hr, $company){
                $user->password = $password;
                $user->company_id = $company->id;
                $user->status_id = 1;
                $user->save();
                $user->assignRole($role_hr);
            });
            
            $role_hra = Role::firstWhere('name', 'hr-assistant-admin');
            User::factory()->count(1)->create()->each(function($user) use($statuses, $password, $role_hra, $company){
                $user->password = $password;
                $user->status_id = 1;
                $user->company_id = $company->id;
                $user->save();
                $user->assignRole($role_hra);
            });
            
        });
    }
}
