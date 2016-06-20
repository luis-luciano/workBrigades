<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestColonyScopesTableSeeder::class);
        $this->call(TestCaptureTypeTableSeeder::class);
        $this->call(TestSettlementTypesTableSeeder::class);
        $this->call(TestColonyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TestSupervisionTableSeeder::class);
        $this->call(TestTypologyTableSeeder::class);
        $this->call(TestProblemTypeTableSeeder::class);
        $this->call(TestBrigadesTableSeeder::class);
        $this->call(RequestPrioritiesTableSeeder::class);
    }
}