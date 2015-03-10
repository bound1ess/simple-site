<?php

if ( ! function_exists('smart_link')) {
    function smart_link($uri, $name) {
        if (strpos($uri, Request::path()) !== false) {
            return sprintf('<li class="active">%s</li>', $name);
        }

        return sprintf('<li><a href="%s">%s</a></li>', $uri, $name);
    }
}
