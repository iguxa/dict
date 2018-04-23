<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dict extends Model
{
    public $timestamps = false;
    public static function get_all(){
        $index = static::orderBy('word')->paginate(4);
        foreach ($index as $key => $value) {
            $results[mb_substr($value->word, 0, 1)][] =
                [
                    $value->word,
                    $value->description,
                    $value->id
                ];
        }
        $paginator = $index->links();
        return $result =
            [
                $results,
                $paginator
            ];
    }
    public static function edit_letter($id,$value){
        return static::where('id', $id)
            ->update(['description' => $value]);
    }
    public static function delete_letter($id){
        return static::where('id', $id)->delete();
    }
    public static function search_letter($letter){
        return DB::select('SELECT * FROM `dicts` WHERE MATCH(`word`) AGAINST( ? IN BOOLEAN MODE) LIMIT 10', [$letter]);
    }
    public static function adder_word($word,$description){
         static::insert(
            ['word' => $word, 'description' => $description]
        );
        return 'Успешно добалено';
    }

}
