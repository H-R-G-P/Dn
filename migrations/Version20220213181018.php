<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213181018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, version_id INT DEFAULT NULL, type INT NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_7CC7DA2C4BBC2705 (version_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql("INSERT INTO video (link, version_id, type) SELECT youtube, id, 1 FROM version v WHERE youtube IS NOT NULL AND youtube <> ''");
        $this->addSql("INSERT INTO video (link, version_id, type) SELECT youtube2, id, 1 FROM version v WHERE v.youtube2 IS NOT NULL AND v.youtube2 <> ''");
        $this->addSql("INSERT INTO video (link, version_id, type) SELECT vk, id, 2 FROM version v WHERE v.vk IS NOT NULL AND v.vk <> ''");
        $this->addSql('ALTER TABLE version DROP youtube, DROP youtube2, DROP vk');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE video');
        $this->addSql('ALTER TABLE version ADD youtube VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'id for youtube video\', ADD youtube2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD vk VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
