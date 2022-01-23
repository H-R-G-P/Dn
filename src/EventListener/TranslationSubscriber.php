<?php declare(strict_types=1);


namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class TranslationSubscriber implements EventSubscriberInterface
{
    public function __construct()
    {
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if ($request->getLocale() !== null && $request->getLocale() !== 'by'){
            $request->setLocale('en');
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => "onKernelRequest",
        ];
    }
}