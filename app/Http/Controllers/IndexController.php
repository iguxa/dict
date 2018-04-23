<?php

namespace App\Http\Controllers;

use App\Dict;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
       $result = Dict::get_all();
        return view('home.index',compact('result'));
    }
    public function search(){
        return view('includes.search');
    }
    public function index_page(){
        $result = Dict::get_all();
        return view('includes.home',compact('result')) -> render();
    }
    public function edit_letter(){
        $id = trim($_POST['id']);
        $value = trim($_POST['value']);
        $result = Dict::edit_letter($id,$value);
        return $result;
    }
    public function delete_letter(){
        $id = trim($_POST['id']);
        $result = Dict::delete_letter($id);
        return $result;
    }
    public function search_letter(){
        $letter = trim($_POST['latter']);
        $command = FunctionController::get_command($letter);
        $result = Dict::search_letter($command);
        if(empty ($result)) return view('message.not_found',compact('result'));
        else return view('includes.search_word',compact('result'));
    }
    public function test(){
        $letter = '';
        $command = FunctionController::get_command($letter);
        $result = Dict::search_letter($command);
        return view('home.test',compact('result'));
    }
    public function add_word(){
        return view('includes.adder_word');
    }
    public function adder_word(Request $r){
        if($r -> ajax())
        {
            $word = mb_convert_case((trim($r->word)), MB_CASE_TITLE, "UTF-8");
            $description = trim($r->description);
            $result = Dict::adder_word($word,$description);
            return view('includes.adder_word',compact('result'));
        }
    }




}
