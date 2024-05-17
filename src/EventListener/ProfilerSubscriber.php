<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class ProfilerSubscriber implements EventSubscriberInterface
{
    /**
     * @var Profiler
     */
    private Profiler $profiler;

    public function __construct(Profiler $profiler)
    {
        $this->profiler = $profiler;
    }

    public function onKernelController(ControllerEvent $event): void
    {
        if ($event->getRequest()->query->get("profiler") === null) {
            $this->profiler->disable();
        } else {
            $this->profiler->enable();
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => "onKernelController",
        ];
    }
}
