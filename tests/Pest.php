<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

$envPath = __DIR__ . '/../.env';
if (!file_exists($envPath)) {
    @file_put_contents($envPath, '');
}


uses(TestCase::class, RefreshDatabase::class)->in('Feature', 'Unit');
