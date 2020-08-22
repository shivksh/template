<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProIdInProfilesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles_models', function (Blueprint $table) {
            $table->renameColumn('pro_Id', 'user_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles_models', function (Blueprint $table) {
            $table->renameColumn('user_id', 'pro_Id');
        });
    }
}
