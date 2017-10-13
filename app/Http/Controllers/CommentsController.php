<?php

namespace App\Http\Controllers;

use App\Comment;
use CloudCreativity\LaravelJsonApi\Http\Controllers\EloquentController;

class CommentsController extends EloquentController
{

    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Comment());
    }

}
