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
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, version_id INT DEFAULT NULL, type VARCHAR(10) NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_7CC7DA2C4BBC2705 (version_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE version DROP youtube, DROP youtube2, DROP vk');
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=iQlmI4UCdtE', '1')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=NdWPJ7PMfeA', '4')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=yV_Gg8Feh2E', '5')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=qCi-eH1HDr0', '7')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=txJyGi6ga8Q', '10')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=5OUvpqNe3Pg', '16')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=bX8FnFqWvJo', '20')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=oq70xpFOTcI', '23')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=oWKZ_oIepTE', '27')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=_rxXWlovCY4', '30')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=i-u-5XjHuz0', '34')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=FylzQACJTaU', '35')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=pr8WAFTgqFU', '40')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=LfTsB9b8eqE', '49')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=q7AGDNnVRks', '65')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=iC8Qbvjxy_0', '68')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=eWSf5b_WgCA', '69')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=cK07wx5UXFk', '70')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=Qp1Z-pH5VNg', '71')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=L6n76FBEmR0', '74')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=xojrtSiWdtc', '75')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=vnnLg8r7dHQ', '76')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://youtu.be/vnnLg8r7dHQ?t=4m3s', '77')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=xw21QBd_BGY', '78')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=o6wRym2BeMg', '79')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=zz4hSfFzUk0', '80')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=QTFFwE-0dnE', '90')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=rNNKcPceweQ', '96')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=UcE6PPMFJDw', '114')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('vk', 'https://vk.com/video-76517089_456239066', '121')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=B0wPLWnwz1A', '126')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=vUvoFSptjAo', '141')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('vk', 'https://vk.com/feed?w=wall69783019_3017', '154')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('vk', 'https://vk.com/video-76517089_456239067', '159')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://youtu.be/CDT319EWZkQ?t=8m47s', '160')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=gVHWmtAoijI', '161')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=ULiqOgMzfmA', '162')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=ol3WsPwj5n4', '163')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=ay_NN3NsxOg', '169')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=YNqyjdf-ceE', '170')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=GgChTdJiwr4', '171')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=SqT2vMTgS2k', '172')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=pUX5i2wk1EA', '174')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=vDOaDKNyqQM', '177')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=R972dhBdppo', '178')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=HY3JxyEL_3Y', '185')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=gdeBy3wYDnQ', '186')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=w_pucuogtRA', '189')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=w_pucuogtRA', '190')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=w_pucuogtRA', '191')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=Q97QN_CEnVE', '193')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=bYh-UEl9tqM', '203')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=Ocg2AS1P-i0', '204')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=Ocg2AS1P-i0', '205')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=Ocg2AS1P-i0', '206')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=tfJbQS0-hgs', '207')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=PhbRX2S3tGw', '293')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=XxFfmwyq5bA', '294')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=KP0le5IdSEc', '295')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=z9S_H_RuwAQ', '296')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=FFIrrqzqboQ', '297')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=iGbEyiCOIoE', '384')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=sXvxfwUXn4o', '385')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('vk', 'https://vk.com/video-31083060_456239159', '390')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=oP7uoW1TS7o', '391')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=pMXXVGWhPac', '392')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=VVyCIkuQuMI', '393')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=efSvWxU1xx0', '394')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=0vXeyRLYGRY', '396')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=0vXeyRLYGRY', '397')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=0vXeyRLYGRY', '398')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=0vXeyRLYGRY', '399')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=0vXeyRLYGRY', '400')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('vk', 'https://vk.com/video-89370094_171199357?list=378585695af34b06f9', '402')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=YIwU2JkGzeA', '403')");
        $this->addSql("INSERT INTO dn.video (type, link, version_id) VALUES ('youtube', 'https://www.youtube.com/watch?v=7MkR6ANM_9I', '404')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE video');
        $this->addSql('ALTER TABLE version ADD youtube VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'id for youtube video\', ADD youtube2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD vk VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
