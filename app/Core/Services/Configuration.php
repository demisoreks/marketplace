<?php

namespace App\Core\Services;

use App\DConfiguration;

class Configuration {

    public static function get() {
        $configurations = DConfiguration::whereId(1);
        if ($configurations->count() == 0) {
            return null;
        } else {
            return $configurations->first();
        }
    }

    public static function update($data) {
        $configuration = Configuration::get();
        if ($configuration == null) {
            $data['id'] = 1;
            DConfiguration::create($data);
        } else {
            $configuration->update($data);
        }
    }

}
