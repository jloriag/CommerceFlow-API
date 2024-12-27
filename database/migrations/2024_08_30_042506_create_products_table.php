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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->mediumText("description");
            $table->double("price");
            $table->unsignedBigInteger("state_id");
            $table->string("brand");
            $table->integer("amount");
            $table->string('sku');
            $table->foreign("state_id")->references('id')->on('states')->onDelete('cascade');
            $table->string('url')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['url']); // Elimina la restricción única
            $table->dropColumn('url'); // Elimina la columna
        });
        Schema::dropIfExists('products');
        
    }
};
