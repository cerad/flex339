<?php

namespace App\Basic\Index;

use App\Common\ActionTrait;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class IndexAction
{
    use ActionTrait;

    public function __invoke(Request $request) : RedirectResponse
    {
        return $this->redirectToRoute('basic_welcome');
    }
}