<?php

namespace App\Basic\Welcome;

use App\Basic\Welcome\WelcomeTemplate;
use App\Common\ActionTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WelcomeAction
{
    use ActionTrait;

    public function __invoke(Request $request, WelcomeTemplate $template) : Response
    {
        return new Response($template->render());
    }
}