<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
            ->WhereIn('t.nombre', $requestTags)
            ->select(['e.id', 'e.titulo', DB::raw('COUNT(t.id) AS found_tags_number')])
            ->groupBy('e.id','e.titulo')
            ->orderBy('found_tags_number', 'DESC')
            ->paginate(10);

        foreach ($posts as $k => $post) {
            $posts[$k]->tags = DB::table('etiquetas as t')
                ->join('entradas_etiquetas as et', 'et.id_etiqueta', '=', 't.id')
                ->where('et.id_entrada', '=', $posts[$k]->id)
                ->select('nombre')
                ->get();
        }

        return $posts;

        //return
    }
}