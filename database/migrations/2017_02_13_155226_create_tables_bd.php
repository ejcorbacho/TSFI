<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesBd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',190)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email',190)->index();
            $table->string('token',190)->index();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',190)->index();
            $table->string('token',190)->index();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 200);
            $table->string('alt', 200);
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->string('apellido', 200);
            $table->integer('id_user')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->integer('foto')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('accion', 200);
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });

        Schema::create('aux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto', 200);
            $table->string('valor', 200);
            $table->timestamps();
        });

        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200);
            $table->string('subtitulo', 200);
            $table->string('resumen_corto', 200);
            $table->string('resumen_largo', 200);
            $table->string('contenido', 200);
            $table->integer('visible');
            $table->integer('foto')->unsigned();
            $table->integer('publico');
            $table->integer('relevancia');
            $table->integer('usuario_publicador')->unsigned();
            $table->foreign('usuario_publicador')->references('id')->on('usuarios');
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200);
            $table->string('subtitulo', 200);
            $table->string('resumen_corto', 200);
            $table->string('resumen_largo', 200);
            $table->string('contenido', 200);
            $table->integer('visible');
            $table->integer('foto')->unsigned();
            $table->integer('publico');
            $table->integer('usuario_publicador')->unsigned();
            $table->foreign('usuario_publicador')->references('id')->on('usuarios');
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->integer('id_padre');
            $table->timestamps();
        });

        Schema::create('enlaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 200);
            $table->string('alt', 200);
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_elemento');
            $table->timestamps();
        });

        Schema::create('entradas_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_entrada')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_entrada')->references('id')->on('entradas');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('enlaces');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('paginas');
        Schema::dropIfExists('entradas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('fotos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('log');
        Schema::dropIfExists('aux');
    }
}
