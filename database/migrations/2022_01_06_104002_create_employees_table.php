<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->bigInteger('nip');
            $table->date('tanggal');
            $table->string('alamat');
            $table->enum('jeniskelamin',['laki-laki','perempuan']);
            $table->string('email');
            $table->bigInteger('no_hp');
            $table->string('kendaraan');
            $table->string('plat');
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
        Schema::dropIfExists('employees');
    }
}
