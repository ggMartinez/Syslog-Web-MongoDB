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
        Schema::create('system_events', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->dateTime('ReceivedAt')->nullable();
            $table->dateTime('DeviceReportedTime')->nullable();
            $table->smallInteger('Facility')->nullable();
            $table->smallInteger('Priority')->nullable();
            $table->string('FromHost', 60)->nullable();
            $table->text('Message')->nullable();
            $table->integer('NTSeverity')->nullable();
            $table->integer('Importance')->nullable();
            $table->string('EventSource', 60)->nullable();
            $table->string('EventUser', 60)->nullable();
            $table->integer('EventCategory')->nullable();
            $table->integer('EventID')->nullable();
            $table->text('EventBinaryData')->nullable();
            $table->integer('MaxAvailable')->nullable();
            $table->integer('CurrUsage')->nullable();
            $table->integer('MinUsage')->nullable();
            $table->integer('MaxUsage')->nullable();
            $table->integer('InfoUnitID')->nullable();
            $table->string('SysLogTag', 60)->nullable();
            $table->string('EventLogType', 60)->nullable();
            $table->string('GenericFileName', 60)->nullable();
            $table->integer('SystemID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_events');
    }
};
