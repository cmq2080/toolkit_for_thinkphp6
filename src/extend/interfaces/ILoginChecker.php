<?php

namespace interfaces;

interface ILoginChecker
{
    public function check();

    /**
     * 仅验证成功后才可调用
     */
    public function postCheck($loginUser, $token = null);
}
