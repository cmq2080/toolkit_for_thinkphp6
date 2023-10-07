<?php
class Response extends \think\Response
{
    public static function success($msg = 'OK', $data = [])
    {
        json(['code' => 1, 'msg' => $msg, 'data' => $data])->send();
        exit;
    }

    public static function error($msg = 'ERROR', $code = 0, $data = [])
    {
        json(['code' => $code, 'msg' => $msg, 'data' => $data])->send();
        exit;
    }
}
