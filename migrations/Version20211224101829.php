<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211224101829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3350DA248');
        $this->addSql('DROP INDEX IDX_BF1CD3C3350DA248 ON version');
        $this->addSql('ALTER TABLE version CHANGE id_dance_id dance_id INT NOT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C365D64EDD FOREIGN KEY (dance_id) REFERENCES dance (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C365D64EDD ON version (dance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C365D64EDD');
        $this->addSql('DROP INDEX IDX_BF1CD3C365D64EDD ON version');
        $this->addSql('ALTER TABLE version CHANGE dance_id id_dance_id INT NOT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3350DA248 FOREIGN KEY (id_dance_id) REFERENCES dance (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3350DA248 ON version (id_dance_id)');
    }
}
