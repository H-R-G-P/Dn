<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Entity\Department;
use App\Entity\Place;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830062822 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $em = $this->container->get('doctrine.orm.entity_manager');
        $data = [1=> 2, 2=> 1, 3=> 2, 4=> 3, 5=> 4, 6=> 2, 7=> 1, 9=> 2, 10=> 1, 11=> 1, 12=> 1, 13=> 3, 17=> 2, 18=> 5, 19=> 2, 20=> 2, 21=> 1, 22=> 1, 23=> 2, 24=> 2, 25=> 2, 27=> 1, 28=> 2, 29=> 5, 30=> 1, 31=> 1, 32=> 1, 33=> 1, 34=> 5, 35=> 5, 36=> 1, 37=> 3, 38=> 3, 39=> 1, 40=> 3, 41=> 1, 42=> 1, 43=> 1, 44=> 1, 45=> 3, 46=> 1, 48=> 6, 49=> 2, 50=> 3, 51=> 2, 52=> 5, 53=> 2, 54=> 1, 55=> 1, 57=> 1, 58=> 1, 59=> 1, 60=> 3, 61=> 3, 62=> 3, 63=> 3, 64=> 3, 65=> 3, 66=> 3, 67=> 3, 68=> 3, 69=> 6, 70=> 2, 71=> 5, 72=> 6, 73=> 6, 74=> 6, 75=> 6, 76=> 2, 77=> 3, 78=> 3, 79=> 3, 80=> 1, 81=> 2, 82=> 1, 83=> 1, 84=> 1, 85=> 1, 86=> 1, 87=> 1, 88=> 1, 89=> 1, 90=> 3, 91=> 5, 92=> 2, 93=> 2, 94=> 2, 95=> 2, 96=> 6, 97=> 6, 98=> 1, 99=> 3, 100=> 4, 101=> 3, 102=> 1, 103=> 5, 104=> 6, 105=> 6, 106=> 6, 107=> 6, 108=> 6, 109=> 6, 110=> 6, 111=> 6, 112=> 4, 113=> 4, 114=> 4, 115=> 4, 116=> 4, 117=> 4, 118=> 4, 119=> 4, 120=> 4, 121=> 4, 122=> 4, 123=> 4, 124=> 4, 125=> 3, 126=> 3, 127=> 3, 128=> 3, 129=> 3, 130=> 3, 131=> 3, 132=> 3, 133=> 3, 134=> 3, 135=> 3, 136=> 3, 137=> 3, 138=> 3, 139=> 3, 140=> 5, 141=> 2, 142=> 4, 143=> 4, 145=> 5, 146=> 5, 147=> 5, 148=> 5, 149=> 5, 150=> 5, 151=> 5, 152=> 5, 153=> 5, 154=> 5, 155=> 5, 156=> 5, 157=> 5, 158=> 5, 159=> 5, 160=> 5, 161=> 5, 162=> 5, 163=> 5, 164=> 5, 166=> 1, 167=> 1, 168=> 1, 169=> 1, 170=> 1, 171=> 1, 172=> 1, 173=> 1, 174=> 1, 175=> 1, 176=> 1, 177=> 1, 178=> 1, 179=> 1, 180=> 1, 181=> 1, 182=> 1, 183=> 1, 184=> 1, 185=> 1, 186=> 1, 187=> 1, 188=> 1, 189=> 1, 190=> 1, 191=> 1, 192=> 1, 193=> 1, 194=> 4, 195=> 1, 196=> 1, 197=> 6, 198=> 6, 199=> 6, 200=> 2, 201=> 1, 202=> 1, 203=> 5, 204=> 2, 205=> 2, 206=> 2, 207=> 2, 208=> 2, 209=> 2, 210=> 2, 211=> 2, 212=> 2, 213=> 2, 214=> 2, 215=> 2, 216=> 2, 217=> 2, 218=> 2, 219=> 2, 220=> 2, 221=> 2, 222=> 2, 223=> 2, 224=> 2, 225=> 2, 226=> 2, 227=> 2, 228=> 2, 229=> 2, 230=> 2, 231=> 2, 232=> 2, 233=> 2, 234=> 2, 235=> 2, 236=> 2, 237=> 2, 238=> 2, 239=> 2, 240=> 2, 241=> 2, 242=> 2, 243=> 2, 244=> 2];
        if ($em !== null && $em instanceof EntityManagerInterface) {
            $places = $em->getRepository(Place::class)->findAll();
            $departmentsRep = $em->getRepository(Department::class);

            foreach ($places as $place) {
                $place->setDepartment($departmentsRep->findOneBy(['id' => $data[$place->getId()]]));
            }
            $em->flush();
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
