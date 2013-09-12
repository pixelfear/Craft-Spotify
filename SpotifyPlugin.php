<?php
namespace Craft;

class SpotifyPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Spotify');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Jason Varga';
    }

    function getDeveloperUrl()
    {
        return 'http://pixelfear.com';
    }
}