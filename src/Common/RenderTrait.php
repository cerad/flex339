<?php
namespace App\Common;

trait RenderTrait
{
  protected function escape($content)
  {
    return htmlspecialchars($content, ENT_COMPAT);
  }
}
