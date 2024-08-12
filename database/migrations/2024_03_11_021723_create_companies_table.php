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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('The Coffee Shop');
            $table->string('company_address')->default('The Coffee Shop address');
            $table->string('company_phone')->default('+84 1231231231');
            $table->string('company_email')->default('TheCoffeeShop@gmail.com');
            $table->string('company_fax')->default('+84 11111111');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
