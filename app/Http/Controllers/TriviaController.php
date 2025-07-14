<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TriviaService;

class TriviaController extends Controller
{
    //宣告物件
    protected $triviaService;

    //將service的物件建立出來
    public function __construct(TriviaService $triviaService){
         $this->triviaService = $triviaService;
    }

    public function trivia($id){
         return $this->triviaService->trivia($id);
    }
}
