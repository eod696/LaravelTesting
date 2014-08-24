<?php
	class Page extends Eloquent {
		protected $table = "content_pages";
		protected $fillable = ['slug', 'title', 'body'];
	}
?>