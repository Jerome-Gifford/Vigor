<?php

use Carbon\Carbon;

class Notification extends Eloquent {

    protected $fillable   = ['from_user_id','to_user_id', 'subject', 'type', 'body', 'object_id', 'object_type', 'sent_at'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function withRecipientUserId($recipientUserId)
    {
        $this->user_id = $recipientUserId;

        return $this;
    }

    public function withSenderUserId($senderUserid)
    {
        $this->from_user_id = $senderUserid;

        return $this;
    }

    public function withSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function withBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function withType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function deliver()
    {
        $this->sent_at = new Carbon;
        $this->save();

        return $this;
    }

    public function scopeUnread($query1)
    {
        return $query1->where('is_read', '=', 0);
    }

    public function hasValidObject()
    {
        try
        {
            $object = call_user_func_array($this->object_type . '::findOrFail', [$this->object_id]);
        }
        catch(\Exception $e)
        {
            return false;
        }

        $this->relatedObject = $object;

        return true;
    }

    public function getObject()
    {
        if(!$this->relatedObject)
        {
            $hasObject = $this->hasValidObject();

            if(!$hasObject)
            {
                throw new \Exception(sprintf("No valid object (%s with ID %s) associated with this notification.", $this->object_type, $this->object_id));
            }
        }

        return $this->relatedObject;
    }

    
    
}