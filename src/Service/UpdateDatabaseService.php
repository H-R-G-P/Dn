<?php declare(strict_types=1);


namespace App\Service;


use App\Entity\Dance;
use App\Entity\Version;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class UpdateDatabaseService
{
    /**
     * @var RequestStack
     */
    private RequestStack $stack;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, RequestStack $stack)
    {
        $this->stack = $stack;
        $this->em = $em;
    }

    /** Increase view count by 1
     * @param Dance $dance
     */
    public function increaseDanceViews(Dance $dance): void
    {
        $session = $this->stack->getSession();
        if (!$session->has($dance->getId().'Dance')) {
            $session->set($dance->getId().'Dance', 'This dance already was viewed.');
            $dance->subView();
            $this->em->flush();
        }
    }

    /** Increase view count by 1
     * @param Version $version
     */
    public function increaseVersionViews(Version $version): void
    {
        $session = $this->stack->getSession();
        if (!$session->has($version->getId().'Version')) {
            $session->set($version->getId().'Version', 'This dance already was viewed.');
            $version->subView();
            $this->em->flush();
        }
    }
}