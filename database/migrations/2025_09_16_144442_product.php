<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('product', function(Blueprint $table){
            $table->id();
            // $table->uuid('id')->primary();
            $table->string('name');
            $table->string('category');
            $table->string('slug');
            $table->longText('description');
            $table->decimal('price', 8,2);
            $table->integer('quantity')->default(0);
            $table->enum('status', ["in_stock", "out-stock", 'pre_order'])
            ->default(("in_stock"));
            // $table->data("available_from")->nullable();
            

        });
    }

};
