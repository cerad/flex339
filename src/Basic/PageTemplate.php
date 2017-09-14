<?php
namespace App\Basic;

use App\Common\RenderTrait;
use Cerad\ProjectBundle\Project\AbstractProject;
use Cerad\ProjectBundle\ProjectFinder;

class PageTemplate
{
    use RenderTrait;

    /** @var AbstractProject  */
    private $project;

    public function __construct(ProjectFinder $projectFinder)
    {
        $this->project = $projectFinder->getCurrentProject();
    }
    public function render(string $content) : string
    {
        return <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$this->escape($this->project->title)}</title>
</head>
<body>
{$content}
</body>
</html>
EOT;

    }
}