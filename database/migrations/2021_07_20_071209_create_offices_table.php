<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->integer('fakultas_id')->nullable();
            $table->integer('prodi_id')->nullable();
            $table->string('file')->nullable();
            // by
            $table->string('token')->nullable();
            $table->text('akun')->nullable();
            $table->text('pesan')->nullable();
            $table->enum('status', [1, 2, 3])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
