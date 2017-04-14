<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class feSearch extends Model {
    protected $table = 'entradas';

    public function searchByTag(Request $request) {
        // let it be array of tag ids:
        $filters = $request->input('data');
        //$n = $request->input('page');
        $requestTags = explode(" ", $filters);

        $posts = DB::table('etiquetas as t')
            ->join('entradas_etiquetas as et', 't.id', '=', 'et.id_etiqueta')
            ->leftJoin('entradas as e', 'e.id', '=', 'et.id_entrada')
            ->orWhereIn('t.nombre', $requestTags)
            ->orWhere('e.titulo','like','%'.$filters.'%')
            ->orWhere('e.contenido','like','%'.$filters.'%')
            ->where('e.visible', '=', '1')
            ->where('e.eliminado', '=', '0')
            ->select(['e.id', 'e.titulo', 'e.data_publicacion' , DB::raw('COUNT(t.id) AS found_tags_number')])
            ->groupBy('e.id','e.titulo','e.data_publicacion')
            ->orderBy('found_tags_number', 'DESC')
            ->paginate(8);

        foreach ($posts as $k => $post) {
            $posts[$k]->tags = DB::table('etiquetas as t')
                ->join('entradas_etiquetas as et', 'et.id_etiqueta', '=', 't.id')
                ->where('et.id_entrada', '=', $posts[$k]->id)
                ->select('nombre')
                ->get();
        }
        //cambio el formato de la fecha
        foreach ($posts as $k => $post) {
            $posts[$k]->data_publicacion = Carbon::parse($posts[$k]->data_publicacion)->format('d-m-Y');
        }

        return $posts;

        //return
    }
}