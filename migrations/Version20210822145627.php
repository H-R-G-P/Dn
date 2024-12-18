<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822145627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6F98260155 FOREIGN KEY (region_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_184BFD6F98260155 ON dance (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6F98260155');
        $this->addSql('DROP INDEX IDX_184BFD6F98260155 ON dance');
        $this->addSql('ALTER TABLE dance DROP region_id');
    }
}
