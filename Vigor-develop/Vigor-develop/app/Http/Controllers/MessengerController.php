<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Conversation as Conversation;
use App\Models\Message as Message;
use Illuminate\Http\Request;

class MessengerController extends Controller {

	public function startConversation($receiver, $msgBody)
	{
		//test if there is an conversation between the two members
    	$convo = Conversation::conversationCheck(Auth::user()->id, $receiver);
    	//create new conversation
    	if (is_null($convo)){
    		$convo = new Conversation;
    		$convo->user_id = Auth::user()->id;
    		$convo->user_id_2 = $receiver;
	    	$convo->save();

	    	$msg = new Message;
	    	$msg->body = $msgBody;
	    	$msg->from_user_id = Auth::user()->id;
	    	$convo->messages()->save($msg);
    	}
	}

	public function isConversation()
	{
		$convo = Conversation::conversationCheck(Auth::user()->id, $receiver);
		if(is_null($convo))
		{
			return false;
		}

		return true;
	}

	public function sendMessage($receiver, $msgBody)
	{
		$convoId = Conversation::where('user_id', '=', Auth::user()->id)->where('user_id_2', '=', $receiver)->pluck('id');
		$convo = Conversation::find($convoId)->get();

		if(!is_null($convo) || $convo = 0)
		{
			$msg = new Message;
	    	$msg->body = $msgBody;
	    	$msg->from_user_id = Auth::user()->id;
	    	$convo->messages()->save($msg);
    	}
	}

	public function getMessages($user1, $user2)
	{
		$convo = Conversation::where('user_id', '=', $user1)->where('user_id_2', '=', $user2);
		$messages = $convo->messages();
		return $messages;
	}
}
