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
 									 'maternal_surname'=>'De Cordoba',
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
        
        $user=User::create(['email'=>'root@root.com',
                        'password'=>'123',//'@HIDRO-123@',
                        'sub_email'=>'admin@root.com',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>1]);
        $user->syncRoles([1]);

        $user=PersonalInformation::create(['name'=>'José Joaquin',
                                     'paternal_surname'=>'Hernandez',
                                     'maternal_surname'=>'Zavala',
                                     'sex'=>'M',
                                     'birthday'=>'2016-06-30',
                                     'house_phone'=>'2727125535',
                                     'mobile_phone'=>'2727123394',
                                     'street'=>'Calle 18 ',
                                     'number'=>'1907',
                                     'interior'=>'0',
                                     'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
                                     ]);
        
        $user=User::create(['email'=>'joaquin.hernandez@hidrosistema.gob.mx',
                        'password'=>'123',//'@HIDRO-123@',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>2]);
        $user->syncRoles([2]);

        $user=PersonalInformation::create(['name'=>'José Luis',
                                     'paternal_surname'=>'Benitez',
                                     'maternal_surname'=>'Parga',
                                     'sex'=>'M',
                                     'birthday'=>'2016-06-30',
                                     'house_phone'=>'2727125535',
                                     'mobile_phone'=>'2727123394',
                                     'street'=>'Calle 18 ',
                                     'number'=>'1907',
                                     'interior'=>'0',
                                     'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
                                     ]);
        
        $user=User::create(['email'=>'joseluis@hidrosistema.gob.mx',
                        'password'=>'123',//'@HIDRO-123@',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>3]);
        $user->syncRoles([2]);

        $user=PersonalInformation::create(['name'=>'Carlos Nicasio',
                                     'paternal_surname'=>'Corona',
                                     'maternal_surname'=>'Nolasco',
                                     'sex'=>'M',
                                     'birthday'=>'2016-06-30',
                                     'house_phone'=>'2727125535',
                                     'mobile_phone'=>'2727123394',
                                     'street'=>'Calle 18 ',
                                     'number'=>'1907',
                                     'interior'=>'0',
                                     'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
                                     ]);
        
        $user=User::create(['email'=>'carlos@hidrosistema.gob.mx',
                        'password'=>'123',//'@HIDRO-123@',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>4]);
        $user->syncRoles([2]);

        $user=PersonalInformation::create(['name'=>'Areli',
                                     'paternal_surname'=>'Pérez',
                                     'maternal_surname'=>'Medina',
                                     'sex'=>'F',
                                     'birthday'=>'2016-06-30',
                                     'house_phone'=>'2727125535',
                                     'mobile_phone'=>'2727123394',
                                     'street'=>'Calle 18 ',
                                     'number'=>'1907',
                                     'interior'=>'0',
                                     'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
                                     ]);
        
        $user=User::create(['email'=>'areli@hidrosistema.gob.mx',
                        'password'=>'123',//'@HIDRO-123@',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>5]);
        $user->syncRoles([3]);

        $user=PersonalInformation::create(['name'=>'Luis',
                                     'paternal_surname'=>'Pérez',
                                     'maternal_surname'=>'Perez',
                                     'sex'=>'F',
                                     'birthday'=>'2016-06-30',
                                     'house_phone'=>'2727125535',
                                     'mobile_phone'=>'2727123394',
                                     'street'=>'Calle 18 ',
                                     'number'=>'1907',
                                     'interior'=>'0',
                                     'profession'=>'Hidrosistema',
                                     'colony_id' => '19'
                                     ]);
        
        $user=User::create(['email'=>'luis@hidrosistema.gob.mx',
                        'password'=>'123',//'@HIDRO-123@',
                        'is_active'=>1,
                        'last_ip'=>'192.168.2.0',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>6]);
        $user->syncRoles([2]);
    }   
}   