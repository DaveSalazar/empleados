<?php

use Illuminate\Database\Seeder;
use App\Sector;

class SectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector = new Sector();

        $sector->des_sector = 'Norte';
        $sector->save();
    
        $sector = new Sector();

        $sector->des_sector = 'Sur';
        $sector->save();

        $sector = new Sector();

        $sector->des_sector = 'Centro';
        $sector->save();
    
    }
}
