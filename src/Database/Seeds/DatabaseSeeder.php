<?php

namespace DOIWeb\Database\Seeds;

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
        $this->call(DOICodeTipoTransacaoSeeder::class);
        $this->command->info('DOICodeTipoTransacaoSeeder loaded!');
        
        $this->call(DOICodeAreaImovelSeeder::class);
        $this->command->info('DOICodeAreaImovelSeeder loaded!');
    }
}
