<?php

use App\PersonalInformation;
use App\User;
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
        PersonalInformation::create(['name'=>'Luis',
 									 'paternal_surname'=>'Luciano',
 									 'maternal_surname'=>'Morales',
 									 'sex'=>'H',
 									 'birthday'=>'2016-06-30',
 									 'represent'=>'fgdfgf',
 									 'house_phone'=>'dsad',
 									 'mobile_phone'=>'sdas',
 									 'street'=>'sdasdasd',
 									 'number'=>'sadsadsd',
 									 'interior'=>'sdsadas',
 									 'profession'=>'sdasdasd',
 									 'colony_id'=>1]);

        User::create(['email'=>'ejemplo@ejemplo.com','password'=>'jshdjhsd','sub_email'=>'jshdjshd','is_active'=>1,'last_ip'=>'kjskdjsd','last_login'=>'2016-06-07 15:47:12','callback_type'=>'jsjdhsjd','personal_information_id'=>1]);
    }
}