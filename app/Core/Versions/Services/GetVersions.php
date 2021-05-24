<?php

namespace App\Core\Versions\Services;

use App\DVersion;

trait GetVersions {

    public function getVersions() {
        $versions = DVersion::all();
        return $versions;
    }

    public function getVersionsByActive($active) {
        $versions  = DVersion::where('active', $active)->get();
        return $versions;
    }

}
