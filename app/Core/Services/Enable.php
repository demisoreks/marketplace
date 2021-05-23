<?php

namespace App\Core\Services;

trait Enable {
    public function enable($record) {
        $record->update([
            'active' => true
        ]);
    }
}
