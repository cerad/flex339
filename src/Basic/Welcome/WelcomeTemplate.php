<?php
namespace App\Basic\Welcome;

use App\Basic\PageTemplate;

class WelcomeTemplate
{
    /** @var PageTemplate  */
    private $pageTemplate;

    public function __construct(PageTemplate $pageTemplate)
    {
        $this->pageTemplate = $pageTemplate;
    }
    public function render(array $data = [])
    {
        $content = <<<EOT
<p>Render Template 2</p>
EOT;

        return $this->pageTemplate->render($content);
    }
}