<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('navbar_logo_path')->nullable()->after('logo_path');
            $table->string('footer_logo_path')->nullable()->after('navbar_logo_path');
            $table->string('hero_image_path')->nullable()->after('footer_logo_path');
            $table->string('about_image_path')->nullable()->after('hero_image_path');
        });

        // Carry the existing shared logo forward as the navbar/footer default so nothing breaks visually.
        DB::table('companies')->whereNotNull('logo_path')->update([
            'navbar_logo_path' => DB::raw('logo_path'),
            'footer_logo_path' => DB::raw('logo_path'),
        ]);

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('logo_path');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('logo_path')->nullable()->after('client_rating');
        });

        DB::table('companies')->whereNotNull('navbar_logo_path')->update([
            'logo_path' => DB::raw('navbar_logo_path'),
        ]);

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['navbar_logo_path', 'footer_logo_path', 'hero_image_path', 'about_image_path']);
        });
    }
};
