<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDoiwebCodeAreaImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doiweb_code_area_imovel', function (Blueprint $table) {
            $table->uuid('id')
                  ->index();
            $table->unsignedInteger('code');
            $table->string('value');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('doiweb_code_area_imovel');
        Schema::enableForeignKeyConstraints();
    }
}
