<?php
namespace Craft;

class SpotifyService extends BaseApplicationComponent
{
	public function createWidget($uri, $width, $height, $show_art, $theme)
	{
		// ensure not above max dimensions
		$width = ($width > 640) ? 640 : $width;
		$height = ($height > 720) ? 720 : $height;

		// only allow 'white' or 'black' themes
		$is_allowed_color = preg_match('/white|black/i', $theme);
		$theme = ($is_allowed_color) ? $theme : FALSE;

		// build parameters
		$theme = ($theme) ? 'theme='.$theme : FALSE;
		$coverart = ($show_art) ? 'view=coverart' : FALSE;
		$params = implode('&', array_filter(array($theme, $coverart)));
		$params = (!empty($params)) ? '&'.$params : FALSE;
		$query = '?uri=' . $uri . $params;

		// output widget
		$widget = '<iframe src="https://embed.spotify.com/'.$query.'" width="'.$width.'" height="'.$height.'" frameborder="0" allowtransparency="true"></iframe>';

		$charset = craft()->templates->getTwig()->getCharset();
		$widget = new \Twig_Markup($widget, $charset);
		return $widget;		
	}

	public function getLink($uri)
	{
		// uri segments
		$uri_segments = explode(":", $uri);
		$last_segment = end($uri_segments);
		$second_last_segment = prev($uri_segments);

		if ($last_segment == "starred")
		{
			$uri_id = $second_last_segment;
			$uri_type = $last_segment;
		}
		else
		{
			$uri_id = $last_segment;
			$uri_type = $second_last_segment;
		}

		$url = "http://open.spotify.com/";
		$username = $uri_segments[2];

		if ($uri_type == "starred") // user's starred playlist?
		{
			$link = $url . 'user/' . $username . '/starred';
		}
		elseif ($uri_type == "playlist") // playlist?
		{
			$link = $url . 'user/' . $username . '/' . $uri_type . '/' . $uri_id;
		}
		else
		{
			$link = $url . $uri_type . '/' . $uri_id;
		}

		return $link;
	}
}