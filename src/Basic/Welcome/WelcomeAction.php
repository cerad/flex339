<?php

namespace App\Basic\Welcome;

use App\Common\ActionTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WelcomeAction
{
    use ActionTrait;

    public function __invoke(Request $request) : Response
    {
        return new Response("Welcome 3");
    }
}