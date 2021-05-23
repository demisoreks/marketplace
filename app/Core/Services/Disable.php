<?php

namespace App\Core\Services;

trait Disable {
    public function disable($record) {
        $record->update([
            'active' => false
        ]);
    }
}
