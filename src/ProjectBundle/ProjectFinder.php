<?php

namespace Cerad\ProjectBundle;

use Cerad\ProjectBundle\Project\AbstractProject;
use Cerad\ProjectBundle\Project\NOC2017Project;

class ProjectFinder
{
    public function getCurrentProject() : AbstractProject
    {
        return new NOC2017Project();
    }
}