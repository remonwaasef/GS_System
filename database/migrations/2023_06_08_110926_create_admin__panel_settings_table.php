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
        Schema::create('admin__panel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name', 250);
            $table->string('photo', 225);
            $table->tinyInteger('active')->default(1);
            $table->string('general_alert', 150)->nullable();
            $table->string('address', 250);
            $table->string('phone', 100)->nullable();
            $table->integer('added_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->integer('com_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__panel_settings');
    }
};
