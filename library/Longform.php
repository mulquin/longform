<?php

class Longform
{
	private $config;
	private $parsedown;
	
	function __construct($config = null)
	{
		$this->config = $config;
		$this->parsedown = new ParsedownExtra();
	}
	
	// Get a single post and parse the markdown
	function getPost($slug)
	{
		$this->parsedown->setRelativePath(POSTS_URI . $slug . '/');
		$post = file_get_contents(POSTS_DIR . $slug . '/' . $slug . POST_EXT);
		
		return $this->parsedown->text($post);
	}
	
	// Get posts that match filter
	function getPosts($filter = null)
	{
		$posts_out = '';
		
		$ignore = array('.','..','index.html');	
		
		$posts = scandir(POSTS_DIR);
		$posts = array_values(array_diff($posts, $ignore));
		
		foreach ($posts as $slug) {
			if (file_exists(POSTS_DIR . $slug . '/' . $slug . POST_EXT) && filesize(POSTS_DIR . $slug . '/' . $slug . POST_EXT) > 0) {
				$posts_out .= $this->getPost($slug);
			}
		}
		
		return $posts_out;
	}
	
	function dump()
	{
		var_dump($this->config, $this->parsedown);
	}
}