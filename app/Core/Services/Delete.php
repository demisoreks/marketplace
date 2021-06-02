<?php

namespace App\Core\Services;

trait Delete {

    public function delete($record) {
        $record->delete();
    }

}
