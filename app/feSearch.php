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
        $requestTags = explode(" ", $filters);

        $posts = DB::table('etiquetas as t')
            ->join('entradas_etiquetas as et', 't.id', '=', 'et.id_etiqueta')
            ->leftJoin('entradas as e', 'e.id', '=', 'et.id_entrada')
            ->WhereIn('t.nombre', $requestTags)
            ->select(['e.id', 'e.titulo', DB::raw('COUNT(t.id) AS found_tags_number')])
            ->groupBy('e.id')
            ->orderBy('found_tags_number', 'DESC')
            ->get();

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

    /*

      $snippets = \DB::table('tags as t')
                  ->join('snippet_tag', 't.id', '=', 'snippet_tag.tag_id')
                  ->leftJoin('snippets as s', 's.id', '=', 'snippet_tag.snippet_id')
                  ->WhereIn('t.name', $tags)
                  ->select(['s.id', 's.title', \DB::raw('COUNT(og_t.id) AS  found_tags_number')])
                  ->groupBy('s.id')
                  ->orderBy('found_tags_number', 'DESC')
                  ->paginate(10);

      foreach ($snippets as $k => $snippet) {
          $snippets[$k]->tags = \DB::table('tags')
                                    ->join('snippet_tag', 'tags.id', '=', 'snippet_tag.tag_id')
                                    ->where('snippet_tag.snippet_id', '=', $snippets[$k]->id)
                                    ->select('name')
                                    ->get();
      }
      */
}