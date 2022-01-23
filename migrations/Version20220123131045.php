<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220123131045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C387562752');
        $this->addSql('DROP INDEX IDX_BF1CD3C387562752 ON version');
        $this->addSql('ALTER TABLE version CHANGE source_id2 source2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3FEF9EFAF FOREIGN KEY (source2_id) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3FEF9EFAF ON version (source2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3FEF9EFAF');
        $this->addSql('DROP INDEX IDX_BF1CD3C3FEF9EFAF ON version');
        $this->addSql('ALTER TABLE version CHANGE source2_id source_id2 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C387562752 FOREIGN KEY (source_id2) REFERENCES source (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BF1CD3C387562752 ON version (source_id2)');
    }
}
