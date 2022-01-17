<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220117223823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version CHANGE source_id2 source_id2 INT DEFAULT NULL, RENAME COLUMN adrady TO abrady, CHANGE comments comments VARCHAR(2000) NOT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C387562752 FOREIGN KEY (source_id2) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C387562752 ON version (source_id2)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C387562752');
        $this->addSql('DROP INDEX IDX_BF1CD3C387562752 ON version');
        $this->addSql('ALTER TABLE version RENAME COLUMN abrady TO adrady, CHANGE comments comments VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE source_id2 source_id2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
