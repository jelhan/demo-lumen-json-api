<?php

use CloudCreativity\LaravelJsonApi\Testing\InteractsWithModels;
use CloudCreativity\LaravelJsonApi\Testing\MakesJsonApiRequests;
use Laravel\Lumen\Testing\DatabaseTransactions;

abstract class TestCaseForFeatures extends TestCase
{
    use MakesJsonApiRequests,
        InteractsWithModels,
        DatabaseTransactions;

    /**
     * @var string
     */
    protected $api = 'v1';
}
