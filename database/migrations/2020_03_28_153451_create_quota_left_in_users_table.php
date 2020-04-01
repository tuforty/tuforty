<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotaLeftInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('quota_left')->default(5);
            $table->unsignedInteger('quota_last_purchased')->default(5);
            $table->unsignedInteger('quota_threshold')->default(70); // 70%
            $table->dateTime('quota_threshold_last_checked_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'quota_left',
                'quota_last_purchased',
                'quota_threshold',
                'quota_threshold_last_checked_at'
            ]);
        });
    }
}
