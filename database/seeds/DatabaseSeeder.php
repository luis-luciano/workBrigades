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
        $this->call(TestSectorSeeder::class);
        $this->call(TestBrigadesTableSeeder::class);
        $this->call(CaptureTypeTableSeeder::class);
        $this->call(RequestStateTableSeeder::class);
        $this->call(RequestPrioritiesTableSeeder::class);
        $this->call(RequestTypesTableSeeder::class);
        $this->call(TestColonyScopesTableSeeder::class); 
        $this->call(TestSettlementTypesTableSeeder::class);
        $this->call(TestPermissionsTableSeeder::class);
        $this->call(TestRoleTableSeeder::class);
        $this->call(TestColonyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TestSupervisionTableSeeder::class);
        $this->call(TestTypologyTableSeeder::class);
        $this->call(TestProblemTypeTableSeeder::class);
        $this->call(BrigadesDefaultSeeder::class);
        $this->call(SectsBrigsTypsTableSeeder::class);
        $this->call(ReplyTypesTableSeeder::class);
    }
}