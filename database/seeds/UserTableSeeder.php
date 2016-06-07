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
    }
}
