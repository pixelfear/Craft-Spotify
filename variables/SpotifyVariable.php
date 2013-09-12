<?php
namespace Craft;

class SpotifyVariable
{
	public function widget($uri, $width=250, $height=330, $show_art=false, $theme=null)
	{
		return craft()->spotify->createWidget($uri, $width, $height, $show_art, $theme);
	}

	public function playButton($uri, $width=250, $height=330, $show_art=false, $theme=null)
	{
		return craft()->spotify->createWidget($uri, $width, $height, $show_art, $theme);
	}

	public function link($uri)
	{
		return craft()->spotify->getLink($uri);
	}
}