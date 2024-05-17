<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LocaleSubscriber implements EventSubscriberInterface
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $uriLocale = explode('/', $request->getPathInfo())[1];

        if (
            $request->attributes->has('exception')
            && $uriLocale !== $request->getLocale()
        ) {
            $updatedUrl = 'http://' . $request->headers->get('host')
                . '/' . $request->getDefaultLocale() . $request->getPathInfo();
            $event->setResponse(new RedirectResponse($updatedUrl));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => "onKernelRequest",
        ];
    }
}
