<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210910140508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance ADD slug VARCHAR(165) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_184BFD6F5E237E06 ON dance (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_184BFD6F989D9B62 ON dance (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_184BFD6F5E237E06 ON dance');
        $this->addSql('DROP INDEX UNIQ_184BFD6F989D9B62 ON dance');
        $this->addSql('ALTER TABLE dance DROP slug');
    }
}
