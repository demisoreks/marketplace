<?php

namespace App\Core\Administrators;

use App\DAdministrator;

interface IAdministrator {

    public function authenticate($email, $password);

    public function login(DAdministrator $administrator);

    public function logout();

    public function getAdministrators();

    public function getAdministratorsByActive($active);

    public function createAdministrator($data);

    public function updateAdministrator(DAdministrator $administrator, $data);

    public function disable(DAdministrator $administrator);

    public function enable(DAdministrator $administrator);

}
