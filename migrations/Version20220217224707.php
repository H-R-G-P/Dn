<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Entity\Place;
use Cocur\Slugify\Slugify;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217224707 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getDescription(): string
    {
        return 'Add slug to place table.';
    }

    public function up(Schema $schema): void
    {

        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place ADD slug VARCHAR(150) NOT NULL');
    }

    public function postUp(Schema $schema): void
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        if ($em !== null && $em instanceof EntityManagerInterface) {
            $places = $em->getRepository(Place::class)->findAll();
            $slugify = new Slugify();

            foreach ($places as $place) {
                $place->setSlug($slugify->slugify($place->getName()));
            }
            $em->flush();
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP slug');
    }
}
