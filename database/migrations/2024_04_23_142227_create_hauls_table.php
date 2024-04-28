<?php

use App\Models\Fish;
use App\Models\Fisherman;
use App\Models\Fishery;
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
        Schema::create('hauls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Fisherman::class)->constrained();
            $table->foreignIdFor(Fish::class)->constrained();
            $table->foreignIdFor(Fishery::class)->constrained();
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hauls');
    }
};
