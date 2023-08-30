<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        if(Schema::hasTable('rating')){

            return;

        }

        Schema::create('packages', function (Blueprint $table) {

            $table->id();
            $table->String('package_name');
            $table->String('destination');
            $table->String('pricing');
            $table->String('description');
            $table->String('ratings');
            $table->String('discount');
            $table->String('picture_link');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
