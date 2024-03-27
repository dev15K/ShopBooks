<?php

use App\Enums\ReviewStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references(/**/ 'id')->on('users')->onDelete('cascade');

            $table->longText('content');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references(/**/ 'id')->on('products')->onDelete('cascade');

            $table->integer('star')->comment('Số sao cho sản phẩm');

            $table->longText('files')->nullable()->comment('File đính kèm');

            $table->string('status')->default(ReviewStatus::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
