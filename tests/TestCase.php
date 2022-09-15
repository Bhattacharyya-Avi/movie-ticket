<?php

namespace Tests;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
