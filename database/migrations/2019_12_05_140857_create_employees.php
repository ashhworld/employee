<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('organization_id');
                $table->boolean('role_id', 2);
                $table->string('full_name', 100);
                $table->string('mobile_no', 10)->unique();
                $table->string('email_id', 50)->unique();
                $table->string('password', 50);
                $table->double('salary', 10);
                $table->integer('age');
                $table->enum('gender', ['male', 'female', 'other']);
                $table->string('address', 300);
                $table->boolean('is_active')->default(1);
                $table->rememberToken();
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
        // Schema::dropIfExists('employees');
    }
}
