<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509171047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geo_point (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, region VARCHAR(255) DEFAULT NULL, district VARCHAR(255) DEFAULT NULL, name_word_stress VARCHAR(255) DEFAULT NULL, subdistrict VARCHAR(255) DEFAULT NULL, name_ru VARCHAR(255) DEFAULT NULL, prefix_by VARCHAR(255) DEFAULT NULL, prefix_ru VARCHAR(255) DEFAULT NULL, CONSTRAINT geo_point_pkey PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD geo_point_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT geo_point_fkey FOREIGN KEY (geo_point_id) REFERENCES geo_point (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDD608CD64 ON place (geo_point_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY geo_point_fkey');
        $this->addSql('DROP TABLE geo_point');
        $this->addSql('DROP INDEX IDX_741D53CDD608CD64 ON place');
        $this->addSql('ALTER TABLE place DROP geo_point_id');
    }
}
