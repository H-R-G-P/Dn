<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210831124642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_31C154875E237E06 ON district (name)');
        $this->addSql('ALTER TABLE district ADD slug VARCHAR(110) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_31C15487989D9B62 ON district (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_31C154875E237E06 ON district');
        $this->addSql('ALTER TABLE district DROP slug');
        $this->addSql('DROP INDEX UNIQ_31C15487989D9B62 ON district');
    }
}
