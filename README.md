14 Sep 2017

Following 

http://fabien.potencier.org/symfony4-demo.html

https://symfony.com/doc/current/setup/flex.html

Added doctrine bundle (required orm)

Still using mysql user impd

The whole app specific env file is still confusing.
I can use fastcgi_param
Be sort of nice to load them from .env file in a server block

Still no controller writeup so lets see.

App\Controller\IndexAction works as expected
Relies on App\Controller default tag stuff

Name for Index,Welcome,Home,TextAlerts,About etc
Misc
Basic

App\Basic\Welcome\WelcomeAction also works as expected
I think it is because the class name is in the route so a simple new is done.
Added logger to confirm service was not being used

Added service to services.yaml and it worked as expected.
Tagged it as controller service argument which also takes care of public true.

There is a new AbstractController which requires assort other bundles such as twig.

Also a ControllerTrait which access the container.

So the question becomes, do I continue to inject the container or always inject standard services?

project,

router,request_stack,token storage and auth checker

I can make an action trait with a setServices(router,etc) and get it to autowire using @required

Might be better to have RouterTrait and SecurityTrait
ActionTrait is used by Controller,Form and View

