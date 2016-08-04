<?php

use App\Colony;
use App\PersonalInformation;
use App\User;
use App\Citizen;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $user=PersonalInformation::create(['name'=>'Administrador',
 									 'paternal_surname'=>'Hidrosistema',
 									 'maternal_surname'=>'Cordoba',
 									 'sex'=>'H',
 									 'birthday'=>'2016-06-30',
 									 'represent'=>'workbrigades',
 									 'house_phone'=>'2727125535',
 									 'mobile_phone'=>'2727123394',
 									 'street'=>'Calle 18 ',
 									 'number'=>'1907',
 									 'interior'=>'0',
 									 'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
 									 ]);
        
        User::create(['email'=>'root@root.com',
                        'password'=>'123',//'@HIDRO-123@',
                        'sub_email'=>'admin@root.com',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>1]);
        Citizen::create(['email'=>'usuario@example.com'])->personalInformation()->associate($user)->save();
    }
}