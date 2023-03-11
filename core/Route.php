<?php 
    namespace App\Core;
    class Route
    {
        function getUrl()
        {
            if (!empty($_SERVER['PATH_INFO'])) {
                $url = $_SERVER['PATH_INFO'];
            } else {
                $url = '/';
            }
            return $url;
        }

        function handleRoute(string $url)
        {
            global $routes;
            unset($routes['default_controller']);
            $url = trim($url, '/');

            if(empty($url)) {
                $url = '/';
            }
            $handleUrl = $url;
            if(!empty($routes)) {
                foreach ($routes as $key => $value) {
                    if(preg_match('~'.$key.'~is', $url)) {
                        $handleUrl = preg_replace('~'.$key.'~is', $value, $url);
                        break;
                    }
                }
            }
            return $handleUrl;
        }
    }
?>