<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoogle2faColumnToUsers extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::table('users', function (Blueprint $table) {
           //下の行を追加
           $table->text('google2fa_secret')->nullable()->after('password');
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
           //下の行を追加
           $table->dropColumn('google2fa_secret');
       });
   }
}