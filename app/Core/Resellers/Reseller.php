<?php

namespace App\Core\Resellers;

use App\Core\Resellers\Services\GetId;
use App\Core\Resellers\Services\Login;
use App\Core\Resellers\Services\Logout;

class Reseller implements IReseller {

    use Login, Logout, GetId;

}
