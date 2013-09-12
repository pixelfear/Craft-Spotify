<?php
namespace Craft;

class Spotify_SpotifyFieldType extends BaseFieldType
{
    public function getName()
    {
        return Craft::t('Spotify');
    }

    public function getInputHtml($name, $value)
    {
        return craft()->templates->render('spotify/field', array(
            'name'  => $name,
            'value' => $value
        ));
    }
}