?php

namespace App\Search;

use App\User;
use Illuminate\Http\Request;

class Search {
    protected $table = 'entradas';

    public static function search(Request $filters) {
        // let it be array of tag ids:
        $tagsIds;

        $postSearch = DB::table($this->table)
            ->join('fotos', 'entradas.foto', '=', 'fotos.id')
            ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
            ->join('categorias','categorias.id', '=', 'entradas_categorias.id_categoria' )
            ->select('entradas.*','categorias.nombre','categorias.id as idcat','fotos.id as fotoId', 'fotos.url as fotosUrl')
            ->where('entradas.id', '=', $id)
            ->get();

            $images = Image::whereHas('tags', function ($q) use ($tagsIds) {
            $q->whereIn('tags.id', $tagsIds);
            }, '=', count($tagsIds))->get();
    }
}