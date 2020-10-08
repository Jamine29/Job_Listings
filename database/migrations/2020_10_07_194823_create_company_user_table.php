<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('companyId')->unsigned();
            $table->timestamps();

            $table->foreign('userId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('companyId')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

            $table->primary(array('companyId', 'userId'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_user');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
