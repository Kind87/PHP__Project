<?php
namespace App\Repositories;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageRepository
{
    public function getAllMessages()
    {
        return Message::get(['id', 'name', 'content', 'created_at', 'updated_at']);
    }

    public function getByContent($content){
        return Message::where("content", "like", "%{$content}%")->orWhere("name", "like", "%{$content}%")->get(["id","name","content",'created_at','updated_at']);
    }

    public function createMessage(Request $request){
        $message = new Message;
        $message->name = $request->name;
        $message->content = $request->content;
        $message->updated_at = NULL;
        $message->save();
        if(!$message) return false;

        return $message;
    }

    public function getById($id){
        $message = Message::find($id);

        if(!$message) return false;

        return $message;
    }
    public function deleteMessages($id){
        $message = $this->getById($id);

        if(!$message) return false;

        $message->delete();
        return true;
    }

    public function updateMessages($id,Request $request){
        $message = $this->getById($id);
        if(!$message) return false;
        
        $message->name = $request->name ?? $message->name;
        $message->content = $request->content ?? $message->content;
        $message->save();
        return $message;
    }

}