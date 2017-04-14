<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//inserts:
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
class CreateTablesBd3 extends Migration
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

        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 200)->unique();
            $table->string('alt', 200);
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
            $table->string('titulo', 200)->nullable();
            $table->string('subtitulo', 200)->nullable();
            $table->string('resumen_largo', 200)->nullable();
            $table->string('localizacion', 500)->nullable();
            $table->longText('contenido')->nullable();
            $table->integer('visible');
            $table->integer('foto')->nullable()->unsigned();
            $table->integer('publico');
            $table->integer('relevancia');
            $table->datetime('data_publicacion')->nullable();
            $table->integer('esdeveniment');
            $table->integer('visitas')->default(0);
            $table->datetime('fecha1')->nullable();
            $table->datetime('fecha2')->nullable();
            $table->integer('notificar')->nullable()->unsigned();
            $table->integer('eliminado');
            $table->integer('usuario_publicador')->unsigned();
            $table->foreign('usuario_publicador')->references('id')->on('users');
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200);
            $table->string('subtitulo', 200);
            $table->longText('contenido');
            $table->integer('foto')->nullable()->unsigned();
            $table->integer('usuario_publicador')->unsigned();
            $table->tinyInteger('eliminado');
            $table->foreign('usuario_publicador')->references('id')->on('users');
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200)->nullable();
            $table->string('contenido', 200);
            $table->string('mail', 200);
            $table->string('nombre', 200);
            $table->integer('visto');
            $table->integer('id_relacion')->nullable();
            $table->datetime('fecha');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200)->unique();
            $table->integer('id_padre')->nullable()->unsigned();
            $table->tinyInteger('eliminado');
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

        Schema::create('etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200);
            $table->timestamps();
        });

        Schema::create('entradas_etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_entrada')->unsigned();
            $table->integer('id_etiqueta')->unsigned();
            $table->foreign('id_entrada')->references('id')->on('entradas');
            $table->foreign('id_etiqueta')->references('id')->on('etiquetas');
            $table->timestamps();
        });

        Schema::create('entidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200);
            $table->integer('son_colaboradoras');
            $table->string('url',500);
            $table->tinyInteger('eliminado');
            $table->integer('foto')->unsigned();
            $table->foreign('foto')->references('id')->on('fotos');
            $table->timestamps();
        });

        Schema::create('entradas_entidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_entrada')->unsigned();
            $table->integer('id_entidad')->unsigned();
            $table->foreign('id_entrada')->references('id')->on('entradas');
            $table->foreign('id_entidad')->references('id')->on('entidades');
            $table->timestamps();
        });

		Schema::create('rellevancia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor');
            $table->timestamps();
        });
        //Insert Data:
        DB::table('users')->insert(
        array(
            'name' => 'Admin',
            'email' => 'admin@tsfisds.com',
            'password' => bcrypt('Tsfi2017')
            )
        );

		DB::table('rellevancia')->insert(
        array(
            'valor' => '0',
            )
        );
		DB::table('rellevancia')->insert(
        array(
            'valor' => '5',
            )
        );
		DB::table('rellevancia')->insert(
        array(
            'valor' => '10',
            )
        );

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
        Schema::dropIfExists('aux');
    }
}
