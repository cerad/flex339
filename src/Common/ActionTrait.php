<?php
namespace App\Common;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

trait ActionTrait
{
    /** @var RouterInterface */
    private $router;

    protected function generateUrl(
        $route,
        $parameters = array(),
        $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
        : string
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }
    protected function redirect($url, $status = 302) : RedirectResponse
    {
        return new RedirectResponse($url, $status);
    }
    protected function redirectToRoute($route, array $parameters = array(), $status = 302) : RedirectResponse
    {
        return $this->redirect($this->generateUrl($route, $parameters), $status);
    }

    /**
     * @param RouterInterface $router
     * @required
     */
    public function setServices(RouterInterface $router)
    {
        $this->router = $router;
    }

}