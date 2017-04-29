<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';

    public function users()
    {
    	return $this->belongsToMany('App\Models\User');
    }

    public function messages()
    {
    	return $this->hasMany('Message', 'conversation_id', 'id');
    }

    public static function conversationCheck($user1, $user2) {
		$convo = Conversation::where('user_id', '=', $user1)->where('user_id_2', '=', $user2);
		if(is_null($convo) || $convo = 0)
		{
			return null;
		}
		return 5;
	}

    protected $fillable = array('user_id', 'user_id_2');
}
