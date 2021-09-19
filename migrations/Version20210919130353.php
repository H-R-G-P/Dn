<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210919130353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, department_id INT NOT NULL, UNIQUE INDEX UNIQ_31C154875E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, district_id_id INT DEFAULT NULL, category VARCHAR(1) NOT NULL, name VARCHAR(150) NOT NULL, department_id INT NOT NULL, lon DOUBLE PRECISION DEFAULT NULL, lat DOUBLE PRECISION DEFAULT NULL, comment VARCHAR(150) DEFAULT NULL, UNIQUE INDEX UNIQ_741D53CD5E237E06 (name), INDEX IDX_741D53CDD0023964 (district_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE place CHANGE category category VARCHAR(3) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDD0023964');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE place');
        $this->addSql('ALTER TABLE place CHANGE category category VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
