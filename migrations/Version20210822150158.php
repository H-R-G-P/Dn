<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822150158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_184BFD6FC54C8C93 ON dance (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6FC54C8C93');
        $this->addSql('DROP INDEX IDX_184BFD6FC54C8C93 ON dance');
        $this->addSql('ALTER TABLE dance DROP type_id');
    }
}
