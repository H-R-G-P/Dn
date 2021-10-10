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
        $this->addSql('DROP TABLE district');
        $this->addSql('ALTER TABLE dance DROP FOREIGN KEY FK_184BFD6F98260155');
        $this->addSql('DROP INDEX IDX_184BFD6F98260155 ON dance');
        $this->addSql('ALTER TABLE dance DROP region_id');
        $this->addSql('DROP INDEX IDX_741D53CDD0023964 ON place');
        $this->addSql('ALTER TABLE place CHANGE district_id_id region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD98260155 ON place (region_id)');
        $this->addSql('ALTER TABLE region ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_F62F176AE80F5DF ON region (department_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, department_id_id INT DEFAULT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_31C1548764E7214B (department_id_id), UNIQUE INDEX UNIQ_31C154875E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C1548764E7214B FOREIGN KEY (department_id_id) REFERENCES department (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE dance ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dance ADD CONSTRAINT FK_184BFD6F98260155 FOREIGN KEY (region_id) REFERENCES region (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_184BFD6F98260155 ON dance (region_id)');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD98260155');
        $this->addSql('DROP INDEX IDX_741D53CD98260155 ON place');
        $this->addSql('ALTER TABLE place CHANGE region_id district_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_741D53CDD0023964 ON place (district_id_id)');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176AE80F5DF');
        $this->addSql('DROP INDEX IDX_F62F176AE80F5DF ON region');
        $this->addSql('ALTER TABLE region DROP department_id');
    }
}
