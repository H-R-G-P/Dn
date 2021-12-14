<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204100618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6F953C1C61');
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6FC54C8C93');
        $this->addSql('DROP INDEX IDX_184BFD6F953C1C61 ON dance');
        $this->addSql('DROP INDEX IDX_184BFD6FC54C8C93 ON dance');
        $this->addSql('ALTER TABLE dance DROP type_id, DROP source_id');
        $this->addSql('ALTER TABLE type CHANGE dancers versionrs INT NOT NULL');
        $this->addSql('ALTER TABLE version ADD type_id INT DEFAULT NULL, ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3953C1C61 FOREIGN KEY (source_id) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3C54C8C93 ON version (type_id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3953C1C61 ON version (source_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance ADD type_id INT DEFAULT NULL, ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6F953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_184BFD6F953C1C61 ON dance (source_id)');
        $this->addSql('CREATE INDEX IDX_184BFD6FC54C8C93 ON dance (type_id)');
        $this->addSql('ALTER TABLE type CHANGE versionrs dancers INT NOT NULL');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3C54C8C93');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3953C1C61');
        $this->addSql('DROP INDEX IDX_BF1CD3C3C54C8C93 ON version');
        $this->addSql('DROP INDEX IDX_BF1CD3C3953C1C61 ON version');
        $this->addSql('ALTER TABLE version DROP type_id, DROP source_id');
    }
}
