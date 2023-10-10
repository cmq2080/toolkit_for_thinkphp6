<?php

class Helper
{
    public static function getTime($as_float = false)
    {
        $timestamp = null;
        if ($as_float) {
            $timestamp = microtime($as_float);
        } else {
            $timestamp = time();
        }

        return $timestamp;
    }

    public static function getDate($fmt = 's', $timestamp = null)
    {
        $fmtList = [
            'Y', 'm', 'd', 'H', 'i', 's'
        ];
        if (!in_array($fmt, $fmtList)) {
            return false;
        }

        if ($timestamp === null) {
            $timestamp = time();
        }
        switch ($fmt) {
            case 'Y':
                return date('Y', $timestamp);
                break;
            case 'm':
                return date('Y-m', $timestamp);
                break;
            case 'd':
                return date('Y-m-d', $timestamp);
                break;
            case 'H':
                return date('Y-m-d H', $timestamp);
                break;
            case 'i':
                return date('Y-m-d H:i', $timestamp);
                break;
            case 's':
                return date('Y-m-d H:i:s', $timestamp);
                break;
        }

        return false;
    }

    public static function getOptions($map, $unshiftArray = null)
    {
        $options = [];

        foreach ($map as $key => $value) {
            $options[] = ['id' => $key, 'name' => $value];
        }

        if ($unshiftArray) {
            array_unshift($options, $unshiftArray);
        }

        return $options;
    }

    public static function getDesc($map, $key, $default = null)
    {
        return $map[$key] ?? $default;
    }

    public static function getFullUrl($uri)
    {
        if (strpos($uri, 'http') === 0) {
            return $uri;
        }

        $url = rtrim(request()->domain(), '/') . '/' . ltrim($uri, '/');
        return $url;
    }
}
