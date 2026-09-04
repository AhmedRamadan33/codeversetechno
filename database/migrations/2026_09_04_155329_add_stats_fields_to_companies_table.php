<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedInteger('projects_delivered')->nullable()->after('founded_year');
            $table->decimal('client_rating', 2, 1)->nullable()->after('projects_delivered');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['projects_delivered', 'client_rating']);
        });
    }
};
