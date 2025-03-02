<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */


    private static $tables = [
        'comments',
        'post_statuses',
        'posts',
        'reaction_types',
        'reactions',
        'replies',
        'users',
    ];


    public function up(): void
    {

        foreach (self::$tables as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::$tables as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        }
    }
};
