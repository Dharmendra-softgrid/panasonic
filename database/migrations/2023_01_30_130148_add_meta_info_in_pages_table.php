<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaInfoInPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('meta_title')->nullable()->after('slug');
            $table->text('meta_keywords')->nullable()->after('meta_title');
            $table->text('meta_description')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
