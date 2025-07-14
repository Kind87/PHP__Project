<?php
namespace App\Services;

class TriviaService{

    public function trivia($id){
        $arr = [            
            '李小龍的動作非常快，快到看不清，所以拍電影時只好放慢膠片的速度。',
            '流沙一般都不深，根本不像電影里的那樣，所以不用擔心，除非使面部被流沙掩埋，不然根本不會有事。',
            '最早被打上條形碼的產品是箭牌口香糖。',
            '在菲律賓溜溜球曾被作為武器。',
            '打噴嚏時無法睜着眼睛。',
        ];

        return $arr[$id];
    }

}