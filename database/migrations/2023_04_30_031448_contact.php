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
        if(Schema::hasTable('contact')){

            return;

        }

        Schema::create('contact', function (Blueprint $table) {

            $table->id();
            $table->String('name');
            $table->String('email');
            $table->biginteger('number')->nullable();
            // $table->String('subject');
            $table->text('subject');
            $table->text('message')->nullable();

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
