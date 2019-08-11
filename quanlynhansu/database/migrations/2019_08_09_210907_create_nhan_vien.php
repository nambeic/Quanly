<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anh');
            $table->string('hoTen');
            $table->string('diaChi');
            $table->integer('tuoi');
            $table->bigInteger('sdt');
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
        Schema::dropIfExists('nhan_vien');
    }
}
