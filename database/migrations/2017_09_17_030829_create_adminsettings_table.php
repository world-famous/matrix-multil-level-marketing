<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminsettings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('width');
            $table->integer('depth');
            $table->string('account_email');
            $table->decimal('membership_budget',5,2);
            $table->text('percent_value')->nullable();
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
        Schema::dropIfExists('adminsettings');
    }
}
