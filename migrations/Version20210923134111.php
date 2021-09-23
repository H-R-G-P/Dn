<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923134111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_CD1DE18A5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE district ADD department_id_id INT DEFAULT NULL, DROP department_id');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C1548764E7214B FOREIGN KEY (department_id_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_31C1548764E7214B ON district (department_id_id)');
        $this->addSql('ALTER TABLE place ADD department_id_id INT DEFAULT NULL, DROP department_id');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD64E7214B FOREIGN KEY (department_id_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD64E7214B ON place (department_id_id)');
        $this->addSql('ALTER TABLE version ADD place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3DA6A219 ON version (place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C1548764E7214B');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD64E7214B');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP INDEX IDX_31C1548764E7214B ON district');
        $this->addSql('ALTER TABLE district ADD department_id INT NOT NULL, DROP department_id_id');
        $this->addSql('DROP INDEX IDX_741D53CD64E7214B ON place');
        $this->addSql('ALTER TABLE place ADD department_id INT NOT NULL, DROP department_id_id');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3DA6A219');
        $this->addSql('DROP INDEX IDX_BF1CD3C3DA6A219 ON version');
        $this->addSql('ALTER TABLE version DROP place_id');
    }
}
