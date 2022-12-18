<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting;

class CreateGlobalSettingsTable extends Migration
{
//    /**
//     * The name of the database table.
//     * @var string|mixed
//     */
//    private $table_name = 'global_settings';
//
//    /**
//     * The name of the key column in the database table.
//     * @var string|mixed
//     */
//    private $key_column = 'key';
//
//    /**
//     * The name of the value column in the database table.
//     * @var string|mixed
//     */
//    private $value_column = 'value';
//
//    /**
//     * The name of the type column in the database table.
//     * @var string|mixed
//     */
//    private $type_column = 'type';
//
//    /**
//     * Create a new CreateGlobalSettingsTable instance.
//     */
//    public function __construct()
//    {
//        $this->table_name = GlobalSetting::tableName();
//        $this->key_column = GlobalSetting::tableKeyColumn();
//        $this->value_column = GlobalSetting::tableValueColumn();
//        $this->type_column = GlobalSetting::tableTypeColumn();
//    }

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable(GlobalSetting::tableName())) {
            Schema::create(GlobalSetting::tableName(), function(Blueprint $table) {
                $table->string(GlobalSetting::tableKeyColumn(), 255)->primary();
                $table->text(GlobalSetting::tableValueColumn());
                $table->enum(GlobalSetting::tableTypeColumn(), ['array', 'boolean', 'float', 'integer', 'json', 'string']);
            });
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(GlobalSetting::tableName());
    }

};
