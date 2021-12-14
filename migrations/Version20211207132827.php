<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207132827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD64E7214B');
        $this->addSql('DROP INDEX IDX_741D53CD64E7214B ON place');
        $this->addSql('ALTER TABLE place CHANGE department_id_id department_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDAE80F5DF ON place (department_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDAE80F5DF');
        $this->addSql('DROP INDEX IDX_741D53CDAE80F5DF ON place');
        $this->addSql('ALTER TABLE place CHANGE department_id department_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD64E7214B FOREIGN KEY (department_id_id) REFERENCES department (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_741D53CD64E7214B ON place (department_id_id)');
    }
}
