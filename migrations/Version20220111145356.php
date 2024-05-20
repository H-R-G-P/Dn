<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220111145356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version ADD department_id INT DEFAULT NULL, ADD region_id INT DEFAULT NULL, ADD is_rec TINYINT(1) NOT NULL, ADD is_imp TINYINT(1) NOT NULL, ADD source_id2 VARCHAR(255) NOT NULL, ADD is_correct_place TINYINT(1) NOT NULL, ADD has_local_video TINYINT(1) NOT NULL, ADD youtube2 VARCHAR(255) NOT NULL, ADD vk VARCHAR(255) NOT NULL, ADD comments VARCHAR(255) NOT NULL, ADD adrady VARCHAR(255) NOT NULL, ADD is_game TINYINT(1) NOT NULL, ADD drob VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C398260155 FOREIGN KEY (region_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C3AE80F5DF ON version (department_id)');
        $this->addSql('CREATE INDEX IDX_BF1CD3C398260155 ON version (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3AE80F5DF');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C398260155');
        $this->addSql('DROP INDEX IDX_BF1CD3C3AE80F5DF ON version');
        $this->addSql('DROP INDEX IDX_BF1CD3C398260155 ON version');
        $this->addSql('ALTER TABLE version DROP department_id, DROP region_id, DROP is_rec, DROP is_imp, DROP source_id2, DROP is_correct_place, DROP has_local_video, DROP youtube2, DROP vk, DROP comments, DROP adrady, DROP is_game, DROP drob');
    }
}
