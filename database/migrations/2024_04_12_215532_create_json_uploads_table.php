<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('json_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('file_name')->unique();
            $table->string('path');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('json_uploads');
    }
};
