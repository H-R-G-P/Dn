<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241115071119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_64C19C15E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE geo_point ADD department_id INT DEFAULT NULL, ADD district_id INT DEFAULT NULL, ADD prefix_be VARCHAR(50) DEFAULT NULL, CHANGE id id BIGINT NOT NULL, CHANGE prefix_ru prefix_ru VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE geo_point ADD CONSTRAINT FK_B7A1D40BAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE geo_point ADD CONSTRAINT FK_B7A1D40BB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_B7A1D40BAE80F5DF ON geo_point (department_id)');
        $this->addSql('CREATE INDEX IDX_B7A1D40BB08FA272 ON geo_point (district_id)');
        $this->addSql('ALTER TABLE place CHANGE geo_point_id geo_point_id BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE geo_point DROP FOREIGN KEY FK_B7A1D40BAE80F5DF');
        $this->addSql('ALTER TABLE geo_point DROP FOREIGN KEY FK_B7A1D40BB08FA272');
        $this->addSql('DROP INDEX IDX_B7A1D40BAE80F5DF ON geo_point');
        $this->addSql('DROP INDEX IDX_B7A1D40BB08FA272 ON geo_point');
        $this->addSql('ALTER TABLE geo_point DROP department_id, DROP district_id, DROP prefix_be, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE prefix_ru prefix_ru VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE place CHANGE geo_point_id geo_point_id INT DEFAULT NULL');
    }
}
