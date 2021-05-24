<?php

namespace App\Core\Versions;

use App\Core\Services\Disable;
use App\Core\Services\Enable;
use App\Core\Versions\Services\CreateVersion;
use App\Core\Versions\Services\GetVersions;
use App\Core\Versions\Services\UpdateVersion;

class Version implements IVersion {

    use GetVersions, CreateVersion, UpdateVersion, Disable, Enable;

}
