<?php
namespace App\Basic\Welcome;

use App\Basic\PageTemplate;
use Zayso\User\Login\UserLoginForm;

class WelcomeTemplate
{
    /** @var PageTemplate  */
    private $pageTemplate;

    /** @var UserLoginForm  */
    private $loginForm;

    public function __construct(PageTemplate $pageTemplate,UserLoginForm $loginForm)
    {
        $this->pageTemplate = $pageTemplate;
        $this->loginForm = $loginForm;
    }
    public function render()
    {
        $content = <<<EOT
<p>Render Template 2</p>
{$this->loginForm->render()}
EOT;

        return $this->pageTemplate->render($content);
    }
}