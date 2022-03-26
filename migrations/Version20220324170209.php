<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Entity\Video;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324170209 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE video ADD youtube_id VARCHAR(30) DEFAULT NULL, ADD link_vk VARCHAR(255) DEFAULT NULL');
    }

    public function postUp(Schema $schema): void
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        if ($em !== null && $em instanceof EntityManagerInterface) {
            $youtubeVideos = $em->getRepository(Video::class)->findBy([
                'type' => 1,
            ]);

            $firstType = 'https://www.youtube.com/watch?v=';
            $secondType = 'https://youtu.be/';
            foreach ($youtubeVideos as $video) {
                if ($video instanceof Video) {
                    if ($video->getLink() !== null) {
                        if (mb_strstr($video->getLink(), $firstType)) {
                            $video->setYoutubeId(substr($video->getLink(), mb_strlen($firstType), 9));
                        } elseif (mb_strstr($video->getLink(), $secondType)) {
                            $video->setYoutubeId(substr($video->getLink(), mb_strlen($secondType), 9));
                        }
                    }
                }
            }

            if ($video135 = $em->find(Video::class, 135)) {
                $video135->setLinkVk('https://vk.com/video_ext.php?oid=-76517089&id=456239066&hash=32882f8743413eb3');
            }
            if ($video136 = $em->find(Video::class, 136)) {
                $video136->setLinkVk('https://vk.com/video_ext.php?oid=69783019&id=456239027&hash=279278f4ff778bda');
            }
            if ($video137 = $em->find(Video::class, 137)) {
                $video137->setLinkVk('https://vk.com/video_ext.php?oid=-76517089&id=456239067&hash=12dcd58226dc6bed');
            }
            if ($video138 = $em->find(Video::class, 138)) {
                $video138->setYoutubeId('Yrs3Yn7x-80');
                $video138->setType(1);
            }
            if ($video139 = $em->find(Video::class, 139)) {
                $em->remove($video139);
            }
            if ($video140 = $em->find(Video::class, 140)) {
                $video140->setLinkVk('https://vk.com/video_ext.php?oid=-89370094&id=171199357&hash=6a704977b065cb00');
            }

            $em->flush();
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE video DROP youtube_id, DROP link_vk');
    }
}
