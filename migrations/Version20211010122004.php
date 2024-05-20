<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211010122004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDD0023964');
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6F98260155');
        $this->addSql('DROP INDEX IDX_184BFD6F98260155 ON dance');
        $this->addSql('ALTER TABLE dance DROP region_id');
        $this->addSql('DROP INDEX IDX_741D53CDD0023964 ON place');
        $this->addSql('ALTER TABLE place CHANGE district_id_id region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD98260155 FOREIGN KEY (region_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD98260155 ON place (region_id)');
        $this->addSql('ALTER TABLE district ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_F62F176AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_31C15487AE80F5DF ON district (department_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dance ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6F98260155 FOREIGN KEY (region_id) REFERENCES district (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_184BFD6F98260155 ON dance (region_id)');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD98260155');
        $this->addSql('DROP INDEX IDX_741D53CD98260155 ON place');
        $this->addSql('ALTER TABLE place CHANGE region_id district_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_741D53CDD0023964 ON place (district_id_id)');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_F62F176AE80F5DF');
        $this->addSql('DROP INDEX IDX_31C15487AE80F5DF ON district');
        $this->addSql('ALTER TABLE district DROP department_id');
    }
}
