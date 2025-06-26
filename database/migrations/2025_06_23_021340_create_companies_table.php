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
            $table->string('name');
            $table->string('rut')->unique();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->constrained('companies')->onDelete('cascade')->nullable();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->constrained('companies')->onDelete('cascade')->nullable();
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->constrained('companies')->onDelete('cascade')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('company_id');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->index('company_id');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero eliminar los índices y llaves foráneas
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropIndex(['company_id']);
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropIndex(['company_id']);
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['company_id']);
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        // Finalmente eliminar la tabla companies
        Schema::dropIfExists('companies');
    }
};
