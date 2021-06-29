<?php

namespace App\Core\Resellers;

interface IReseller {

    public function login($id);

    public function logout();

}
