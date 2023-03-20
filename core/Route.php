<?php

namespace App\Core;

class Route {

    function getUrl() {
        if(!empty($_SERVER['REQUEST_URI'])) {
            $url = $_SERVER['REQUEST_URI'];
        } else {
            $url = '/';
        }

        return $url;
    }

    function handleRoute(string $url)
    : array|string|null {
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url, '/');

        if(empty($url)) {
            $url = '/';
        }
        $handleUrl = $url;
        if(!empty($routes)) {
            foreach ($routes as $key => $value) {
                if(preg_match('~' . $key . '~is', $url)) {
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                    break;
                }
            }
        }

        return $handleUrl;
    }
}

?>