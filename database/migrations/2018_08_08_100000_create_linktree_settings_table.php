<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//class CreateLinktreeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('linktree_settings')) {
            Schema::create('linktree_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key', 255);
                $table->text('value');
                $table->enum('type', ['integer', 'float', 'string', 'json']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linktree_settings');
    }
};
