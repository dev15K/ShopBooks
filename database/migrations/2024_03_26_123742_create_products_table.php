<?php

use App\Enums\ProductStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('name_vi');
            $table->string('name_en');

            $table->longText('short_description');
            $table->longText('short_description_vi');
            $table->longText('short_description_en');

            $table->longText('description');
            $table->longText('description_vi');
            $table->longText('description_en');

            $table->longText('thumbnail');
            $table->longText('gallery');

            $table->float('price');

            $table->string('status')->default(ProductStatus::ACTIVE);

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references(/**/ 'id')->on('users')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
