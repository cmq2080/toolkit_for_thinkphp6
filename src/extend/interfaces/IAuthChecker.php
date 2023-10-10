<?php

namespace interfaces;

interface IAuthChecker
{
    public function check();

    /**
     * 无论验证成功与否都可以调用
     */
    public function postCheck($success, $loginUser = null);
}
