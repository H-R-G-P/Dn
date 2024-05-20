<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331164808 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, place_id INT NOT NULL, name VARCHAR(200) NOT NULL, text LONGTEXT NOT NULL, genre VARCHAR(100) NOT NULL, artist VARCHAR(200) NOT NULL, area VARCHAR(30) NOT NULL, year VARCHAR(10) NOT NULL, record VARCHAR(40) NOT NULL, comments TINYTEXT NOT NULL, audio_origin VARCHAR(150) NOT NULL, audio_artist VARCHAR(150) NOT NULL, audio_rep VARCHAR(150) NOT NULL, INDEX IDX_33EDEEA198260155 (region_id), INDEX IDX_33EDEEA1DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA198260155 FOREIGN KEY (region_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE song');
    }
}
