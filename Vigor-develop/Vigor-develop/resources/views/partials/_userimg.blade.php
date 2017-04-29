<div class="user-img">
	<!--Pull User Image Here-->
	{!! HTML::image('/userimg/' . Auth::user()->id . '/' . Auth::user()->profile_image, 'Upload Profile Picture', array('width' => '100%', 'height' => '100%')) !!}
</div>