<?php

namespace App\Core\Versions;

use App\DVersion;

interface IVersion {

    public function getVersions();

    public function getVersionsByActive($active);

    public function createVersion($data);

    public function updateVersion(DVersion $version, $data);

    public function disable(DVersion $version);

    public function enable(DVersion $version);

}
