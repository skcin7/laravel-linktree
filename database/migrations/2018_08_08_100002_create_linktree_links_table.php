<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//class CreateLinktreeLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('linktree_links')) {
            Schema::create('linktree_links', function (Blueprint $table) {
                $table->id();
                $table->foreignId('group_id')->constrained('linktree_groups');
                $table->string('name', 255);
                $table->text('description');
                $table->string('href', 255);
                $table->boolean('is_hidden')->default(false);
                $table->integer('clicks')->default(0);
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
        Schema::dropIfExists('linktree_links');
    }
};
