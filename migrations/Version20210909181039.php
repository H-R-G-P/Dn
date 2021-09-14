<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210909181039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE source ADD slug VARCHAR(110) NOT NULL, ADD name_short VARCHAR(40) NOT NULL, ADD url VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL, ADD `from` VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F8A7F735E237E06 ON source (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F8A7F73989D9B62 ON source (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_5F8A7F735E237E06 ON source');
        $this->addSql('DROP INDEX UNIQ_5F8A7F73989D9B62 ON source');
        $this->addSql('ALTER TABLE source DROP slug, DROP name_short, DROP url, DROP description, DROP `from`');
    }
}
