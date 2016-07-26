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

        $user=PersonalInformation::create(['name'=>'Luis',
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
                                     'colony_id' => '1'
 									 ]);
        //$user->colony()->associate(Colony::find(1))->save();
        $user2=PersonalInformation::create(['name'=>'Ivan',
                                     'paternal_surname'=>'De la luz',
                                     'maternal_surname'=>'alvarez',
                                     'sex'=>'H',
                                     'birthday'=>'2016-06-30',
                                     'represent'=>'fgdfgf',
                                     'house_phone'=>'dsad',
                                     'mobile_phone'=>'sdas',
                                     'street'=>'sdasdasd',
                                     'number'=>'sadsadsd',
                                     'interior'=>'sdsadas',
                                     'profession'=>'sdasdasd',
                                     'colony_id' => '1'
                                     ]);
       // $user2->colony()->associate(Colony::find(2))->save();
        $user3=PersonalInformation::create(['name'=>'kary',
                                     'paternal_surname'=>'pachecon',
                                     'maternal_surname'=>'Juarez',
                                     'sex'=>'M',
                                     'birthday'=>'2016-06-30',
                                     'represent'=>'fgdfgf',
                                     'house_phone'=>'dsad',
                                     'mobile_phone'=>'sdas',
                                     'street'=>'sdasdasd',
                                     'number'=>'sadsadsd',
                                     'interior'=>'sdsadas',
                                     'profession'=>'sdasdasd',
                                     'colony_id' => '1'
                                     ]);
        //$user3->colony()->associate(Colony::find(3))->save();

        $user4=PersonalInformation::create(['name'=>'Jorge',
                                     'paternal_surname'=>'namitle',
                                     'maternal_surname'=>'chimalgua',
                                     'sex'=>'H',
                                     'birthday'=>'2016-06-30',
                                     'represent'=>'fgdfgf',
                                     'house_phone'=>'dsad',
                                     'mobile_phone'=>'sdas',
                                     'street'=>'sdasdasd',
                                     'number'=>'sadsadsd',
                                     'interior'=>'sdsadas',
                                     'profession'=>'sdasdasd',
                                     'colony_id' => '1'
                                     ]);
        //$user4->colony()->associate(Colony::find(4))->save();


        User::create(['email'=>'ejemplo@ejemplo.com',
                        'password'=>'jshdjhsd',
                        'sub_email'=>'jshdjshd',
                        'is_active'=>1,
                        'last_ip'=>'kjskdjsd',
                        'last_login'=>'2016-06-07 15:47:12',
                        'callback_type'=>'jsjdhsjd',
                        'personal_information_id'=>1]);
        Citizen::create(['email'=>'usuario@example.com'])->personalInformation()->associate($user)->save();
    }
}