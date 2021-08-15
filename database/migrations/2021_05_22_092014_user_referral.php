<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserReferral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->bigInteger('invited_by_user_id')->nullable();
            $table->string('referral_link', 191)->nullable();
            $table->string('referral_level', 191)->nullable();
            $table->string('commission', 191)->nullable();
            $table->string('commission_partner', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
