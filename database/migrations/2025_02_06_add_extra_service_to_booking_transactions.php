<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('booking_transactions', function (Blueprint $table) {
            $table->string('extra_service')->nullable()->after('total_participant');
            $table->unsignedBigInteger('extra_service_price')->default(0)->after('extra_service');
        });
    }

    public function down(): void
    {
        Schema::table('booking_transactions', function (Blueprint $table) {
            $table->dropColumn(['extra_service', 'extra_service_price']);
        });
    }
};
