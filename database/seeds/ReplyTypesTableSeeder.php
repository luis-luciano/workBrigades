<?php

use Illuminate\Database\Seeder;
use App\ReplyType;

class ReplyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replyTypes = [
            [
                'label' => 'Favorable',
            ],
            [
                'label' => 'Negativa',
            ],
        ];

        foreach ($replyTypes as $replyType) {
            ReplyType::create($replyType);
        }
    }
}
