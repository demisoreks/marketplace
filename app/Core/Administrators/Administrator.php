<?php

namespace App\Core\Administrators;

use App\Core\Administrators\Services\Authenticate;
use App\Core\Administrators\Services\CreateAdministrator;
use App\Core\Administrators\Services\GetAdministrators;
use App\Core\Administrators\Services\Login;
use App\Core\Administrators\Services\Logout;
use App\Core\Administrators\Services\UpdateAdministrator;
use App\Core\Services\Disable;
use App\Core\Services\Enable;

class Administrator implements IAdministrator {

    use Authenticate, Login, Logout, GetAdministrators, CreateAdministrator, UpdateAdministrator, Disable, Enable;

}
