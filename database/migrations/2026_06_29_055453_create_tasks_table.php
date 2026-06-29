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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();                          // bigint unsigned, PRI, auto_increment
        $table->string('title');               // varchar(255), NOT NULL
        $table->text('description')->nullable(); // text, NULL
        $table->string('employee_name');       // varchar(255), NOT NULL
        $table->date('due_date');              // date, NOT NULL
        $table->string('status')->default('Pending'); // varchar(255), default Pending
        $table->timestamps();                  // created_at + updated_at (nullable timestamps)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
