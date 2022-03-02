<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Entity\Dance;
use App\Service\HelperService;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302144406 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $em = $this->container->get('doctrine.orm.entity_manager');
        if ($em !== null && $em instanceof EntityManagerInterface) {
            $dances = $em->getRepository(Dance::class)->findAll();

            foreach ($dances as $dance) {
                $dance->setSlug(HelperService::slugify($dance->getName()));
                $em->persist($dance);
            }
            $em->flush();
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
