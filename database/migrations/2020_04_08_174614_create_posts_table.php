<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Un post pertenece a un usuario
            $table->unsignedBigInteger('category_id'); // Un post pertenece a una categoría
            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->mediumText('excerpt')->nullable(); // Extracto
            $table->mediumText('body');
            $table->enum('status', ['DRAFT', 'PUBLISHED'])->default('DRAFT'); // Estados posibles
            $table->string('file', 128)->nullable(); // Imagen del post
            $table->timestamps();

            // Relations
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // El campo user_id es una clave ajena (foreign) relacionado con el campo id (references) de la tabla usuarios (users)
                // Cuando se elimine de la tabla maestra (o se edite) un usuario se borrará/actualizará en cascada sus posts

            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // El campo category_id es una clave ajena (foreign) relacionado con el campo id (references) de la tabla usuarios (categories)
                // Cuando se elimine de la tabla maestra (o se edite) un usuario se borrará/actualizará en cascada sus posts                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
