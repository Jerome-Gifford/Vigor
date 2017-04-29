<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $table = 'messages';

	public function conversation()
	{
		return $this->belongsTo('App\Models\Conversation');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	protected $fillable = array('body');
}
