<?php namespace ReadTime;

/*
Plugin Name: Read Time
Description: Display estimated reading time for a post. 
Version: 1.0.0
License: MIT
*/

/**
* Display estimated reading time, similar to Medium.
* Assumes a reading speed of 200 words per minute.
*/
function readTime($text) {
	$words = str_word_count(strip_tags($text));
	$readTime = floor($words / 200);

	return ($readTime < 1) ? 'Less than 1 min read' : "{$readTime} min read";
}

add_shortcode('readtime', function() {
	global $post;
	$time = readTime($post->post_content);
	return "<span class=\"read-time\">{$time}</span>";
});
