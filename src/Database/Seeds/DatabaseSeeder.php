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

        $this->call(DoiWebCodeFormaAlienacaoAquisicaoSeeder::class);
        $this->command->info('DoiWebCodeFormaAlienacaoAquisicaoSeeder loaded!');
		
		$this->call(DOICodeTipoSituacaoSeeder::class);
        $this->command->info('DOICodeTipoSituacaoSeeder loaded!');
    }
}
