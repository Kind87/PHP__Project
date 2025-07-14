<?php
namespace App\Services;

//使用Repositories
use App\Repositories\MessageRepository;

use Illuminate\Http\Request;


class MessageService{

    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository){
        $this->messageRepository = $messageRepository;
    }

    public function getAllMessages(){
        return $this->messageRepository->getAllMessages();
    }

    public function getByContent($content){
        return $this->messageRepository->getByContent($content);
    }

    public function createMessage(Request $request){
        return $this->messageRepository->createMessage($request);
    }

    public function deleteMessages($id){
        return $this->messageRepository->deleteMessages($id);
    }

    public function updateMessages($id,Request $request){
        return $this->messageRepository->updateMessages($id, $request);
    }

    public function getById($id){
        return $this->messageRepository->getById($id);
    }

}