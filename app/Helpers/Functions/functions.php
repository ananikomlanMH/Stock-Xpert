<?php
/**
 * @param string $key
 * @param null $default
 * @return mixed
 */
function request(string $key, $default = null): mixed
{
    if (!empty($_GET[$key])) return $_GET[$key];
    return $default;
}