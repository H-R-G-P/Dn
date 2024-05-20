<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404151408 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA198260155');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA1DA6A219');
        $this->addSql('DROP INDEX IDX_33EDEEA198260155 ON song');
        $this->addSql('DROP INDEX IDX_33EDEEA1DA6A219 ON song');
        $this->addSql('ALTER TABLE song ADD region VARCHAR(40) NOT NULL, ADD place VARCHAR(40) NOT NULL, DROP region_id, DROP place_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song ADD region_id INT NOT NULL, ADD place_id INT NOT NULL, DROP region, DROP place');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA198260155 FOREIGN KEY (region_id) REFERENCES district (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_33EDEEA198260155 ON song (region_id)');
        $this->addSql('CREATE INDEX IDX_33EDEEA1DA6A219 ON song (place_id)');
    }
}
