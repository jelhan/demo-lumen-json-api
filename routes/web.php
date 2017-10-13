<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use CloudCreativity\LaravelJsonApi\Routing\ApiGroup as Api;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

app("json-api")->register('v1', [], function (Api $api) {
    $api->resource('comments');
    $api->resource('people');
    $api->resource('posts', ['has-one' => 'author', 'has-many' => ['comments', 'tags']]);
    $api->resource('sites');
});
