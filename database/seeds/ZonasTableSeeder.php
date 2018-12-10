<?php

use Illuminate\Database\Seeder;
use App\Zona;
use App\Sector;
class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector = Sector::where('des_sector', 'Norte')->first();
        
        $zona = new Zona();

        $zona->des_zona = 'Guayacanes';
        $sector->zonas()->save($zona);
    
        $zona = new Zona();

        $zona->des_zona = 'Garzona';
        $sector->zonas()->save($zona);
        
        $zona = new Zona();

        $zona->des_zona = 'Urdesa';
        $sector->zonas()->save($zona);
    

        $sector = Sector::where('des_sector', 'Sur')->first();
        
        $zona = new Zona();

        $zona->des_zona = 'Sopena';
        $sector->zonas()->save($zona);
    
        $zona = new Zona();

        $zona->des_zona = 'Esteros';
        $sector->zonas()->save($zona);
    
        $sector = Sector::where('des_sector', 'Centro')->first();
        
        $zona = new Zona();

        $zona->des_zona = 'Las Penas';
        $sector->zonas()->save($zona);
    
        $zona = new Zona();

        $zona->des_zona = 'Palacio de Cristal';
        $sector->zonas()->save($zona);
    
    }
}
