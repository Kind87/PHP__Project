<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;

//使用Service
use App\Services\MessageService;

class MessageController extends Controller
{   
    protected $messageService;

    public function __construct(MessageService $messageService){
        $this->messageService = $messageService;
    }

    //回傳錯誤訊息
    public function handleError($message,$ErrorContent){
        if(!$message) return response()->json(["messages" => $ErrorContent], 404);
    }

    //得到全部資料
    public function getAllMessages(){
        $messages = $this->messageService->getAllMessages();
        
        return response()->json($messages, 200, [], JSON_PRETTY_PRINT);
    }

    //搜尋留言
    public function getByContent($content){
        $message = $this->messageService->getByContent($content);
        
        return response()->json($message, 200, [], JSON_PRETTY_PRINT);
    }

    //新增資料
    public function createMessage(Request $request){
        $request = $this->messageService->createMessage($request);

        if(!$request) return $this->handleError($request,"資料新增失敗");

        return response()->json(['message' => '資料新增成功'], 200);
    }

    //刪除資料
    public function deleteMessages($id){
        $message = $this->messageService->deleteMessages($id);
        
        if(!$message) return $this->handleError($message,"資料刪除失敗");

        return response()->json(["messages" => "資料刪除成功"], 200);
    }

    //更新資料
    public function updateMessages($id,Request $request){
        $message = $this->messageService->updateMessages($id,$request);

        if(!$message) return $this->handleError($message,"資料更新失敗");

        return response()->json(["messages" => "資料更新成功"], 200);
    }

    //取得使用者ID
    public function getById($id){
        $message = $this->messageService->getById($id);
        
        if(!$message) return $this->handleError($message,"找不到使用者");

        return response()->json($message, 200, [], JSON_PRETTY_PRINT);
    }

}
