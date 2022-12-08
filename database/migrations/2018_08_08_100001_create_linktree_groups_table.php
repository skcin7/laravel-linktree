<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//class CreateLinktreeLinkGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('linktree_groups')) {
            Schema::create('linktree_groups', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->text('description');
                $table->integer('priority')->default(0);
                $table->boolean('is_hidden')->default(false);
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
        Schema::dropIfExists('linktree_groups');
    }
};
