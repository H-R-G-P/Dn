<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826020459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song CHANGE genre genre VARCHAR(100) DEFAULT NULL, CHANGE artist artist VARCHAR(200) DEFAULT NULL, CHANGE area area VARCHAR(30) DEFAULT NULL, CHANGE year year VARCHAR(10) DEFAULT NULL, CHANGE record record VARCHAR(40) DEFAULT NULL, CHANGE comments comments LONGTEXT DEFAULT NULL, CHANGE audio_origin audio_origin VARCHAR(150) DEFAULT NULL, CHANGE audio_artist audio_artist VARCHAR(150) DEFAULT NULL, CHANGE audio_rep audio_rep VARCHAR(150) DEFAULT NULL, CHANGE region region VARCHAR(40) DEFAULT NULL, CHANGE place place VARCHAR(40) DEFAULT NULL');
        $this->addSql("update song set genre=null where genre='';");
        $this->addSql("update song set artist=null where artist='';");
        $this->addSql("update song set area=null where area='';");
        $this->addSql("update song set year=null where year='';");
        $this->addSql("update song set record=null where record='';");
        $this->addSql("update song set comments=null where comments='';");
        $this->addSql("update song set audio_origin=null where audio_origin='';");
        $this->addSql("update song set audio_artist=null where audio_artist='';");
        $this->addSql("update song set audio_rep=null where audio_rep='';");
        $this->addSql("update song set region=null where region='';");
        $this->addSql("update song set place=null where place='';");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song CHANGE genre genre VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE artist artist VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE area area VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE region region VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE place place VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE year year VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE record record VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE comments comments TINYTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE audio_origin audio_origin VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE audio_artist audio_artist VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE audio_rep audio_rep VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql("update song set genre='' where genre=null;");
        $this->addSql("update song set artist='' where artist=null;");
        $this->addSql("update song set area='' where area=null;");
        $this->addSql("update song set year='' where year=null;");
        $this->addSql("update song set record='' where record=null;");
        $this->addSql("update song set comments='' where comments=null;");
        $this->addSql("update song set audio_origin='' where audio_origin=null;");
        $this->addSql("update song set audio_artist='' where audio_artist=null;");
        $this->addSql("update song set audio_rep='' where audio_rep=null;");
        $this->addSql("update song set region='' where region=null;");
        $this->addSql("update song set place='' where place=null;");
    }
}
