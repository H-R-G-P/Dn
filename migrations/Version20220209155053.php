<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209155053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("UPDATE version t SET t.slug = 'a-barina-na-dvare-vyarechcha' WHERE t.id = 286");
        $this->addSql("UPDATE version t SET t.slug = 'aberak' WHERE t.id = 95");
        $this->addSql("UPDATE version t SET t.slug = 'aberak2' WHERE t.id = 96");
        $this->addSql("UPDATE version t SET t.slug = 'aberak-byalya-shchyna' WHERE t.id = 254");
        $this->addSql("UPDATE version t SET t.slug = 'aberak-garadok' WHERE t.id = 387");
        $this->addSql("UPDATE version t SET t.slug = 'aberak-klompiki' WHERE t.id = 79");
        $this->addSql("UPDATE version t SET t.slug = 'aberak-saroki' WHERE t.id = 145");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-buyki' WHERE t.id = 251");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-garadok' WHERE t.id = 385");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-macka-cy' WHERE t.id = 106");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-pogiry' WHERE t.id = 193");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-shutavichy' WHERE t.id = 6");
        $this->addSql("UPDATE version t SET t.slug = 'akulina-zalesse' WHERE t.id = 250");
        $this->addSql("UPDATE version t SET t.slug = 'amberak-pogiry' WHERE t.id = 255");
        $this->addSql("UPDATE version t SET t.slug = 'anton-palazhevichy' WHERE t.id = 338");
        $this->addSql("UPDATE version t SET t.slug = 'balamut-taluc' WHERE t.id = 107");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-babichy' WHERE t.id = 70");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-chyzhaha' WHERE t.id = 340");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-gorki' WHERE t.id = 341");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-lasi' WHERE t.id = 404");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-rymashy' WHERE t.id = 339");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-semerniki' WHERE t.id = 264");
        $this->addSql("UPDATE version t SET t.slug = 'barynya-vaclavova' WHERE t.id = 285");
        $this->addSql("UPDATE version t SET t.slug = 'bazar-babichy' WHERE t.id = 9");
        $this->addSql("UPDATE version t SET t.slug = 'bazar-rudnya-nisimkavickaya' WHERE t.id = 423");
        $this->addSql("UPDATE version t SET t.slug = 'bazar-sinichyna' WHERE t.id = 430");
        $this->addSql("UPDATE version t SET t.slug = 'bes-101-byalko-shchyna' WHERE t.id = 7");
        $this->addSql("UPDATE version t SET t.slug = 'bes-101-kaha-navichy' WHERE t.id = 298");
        $this->addSql("UPDATE version t SET t.slug = 'blytanka' WHERE t.id = 101");
        $this->addSql("UPDATE version t SET t.slug = 'chabatok-myadzel-stary' WHERE t.id = 383");
        $this->addSql("UPDATE version t SET t.slug = 'chabor' WHERE t.id = 36");
        $this->addSql("UPDATE version t SET t.slug = 'charot-macka-cy' WHERE t.id = 127");
        $this->addSql("UPDATE version t SET t.slug = 'chobaty' WHERE t.id = 37");
        $this->addSql("UPDATE version t SET t.slug = 'chobaty-buynavichy' WHERE t.id = 125");
        $this->addSql("UPDATE version t SET t.slug = 'chobaty-mazyr' WHERE t.id = 412");
        $this->addSql("UPDATE version t SET t.slug = 'chobaty-yuncavichy' WHERE t.id = 105");
        $this->addSql("UPDATE version t SET t.slug = 'da-zhok2-gortal' WHERE t.id = 310");
        $this->addSql("UPDATE version t SET t.slug = 'drabatuha-hacisla' WHERE t.id = 123");
        $this->addSql("UPDATE version t SET t.slug = 'dudaryk-dudachka-maskalyanyaty' WHERE t.id = 283");
        $this->addSql("UPDATE version t SET t.slug = 'dvoyka-gayna' WHERE t.id = 114");
        $this->addSql("UPDATE version t SET t.slug = 'dze-ka-senyah-haromcy' WHERE t.id = 208");
        $this->addSql("UPDATE version t SET t.slug = 'dzed-bob-malaci-kazlo-shchyna' WHERE t.id = 248");
        $this->addSql("UPDATE version t SET t.slug = 'fakstrot' WHERE t.id = 157");
        $this->addSql("UPDATE version t SET t.slug = 'fakstrot-pogiry' WHERE t.id = 92");
        $this->addSql("UPDATE version t SET t.slug = 'galubec' WHERE t.id = 179");
        $this->addSql("UPDATE version t SET t.slug = 'gapak' WHERE t.id = 41");
        $this->addSql("UPDATE version t SET t.slug = 'gapak-baloty' WHERE t.id = 209");
        $this->addSql("UPDATE version t SET t.slug = 'gapak-gadzichava' WHERE t.id = 121");
        $this->addSql("UPDATE version t SET t.slug = 'gapak-selishcha-barysa-ski' WHERE t.id = 54");
        $this->addSql("UPDATE version t SET t.slug = 'gapak-shascisnopy' WHERE t.id = 78");
        $this->addSql("UPDATE version t SET t.slug = 'genspanser-ra-dastava' WHERE t.id = 322");
        $this->addSql("UPDATE version t SET t.slug = 'girsha-moysha-zhydok-illya' WHERE t.id = 75");
        $this->addSql("UPDATE version t SET t.slug = 'grachaniki-alho-ka' WHERE t.id = 270");
        $this->addSql("UPDATE version t SET t.slug = 'grachaniki-davyd-garadok' WHERE t.id = 65");
        $this->addSql("UPDATE version t SET t.slug = 'grachaniki-varvara-ka' WHERE t.id = 210");
        $this->addSql("UPDATE version t SET t.slug = 'grachaniki-zimovishchy' WHERE t.id = 13");
        $this->addSql("UPDATE version t SET t.slug = 'grechka-ra-dastava' WHERE t.id = 331");
        $this->addSql("UPDATE version t SET t.slug = 'hmel-andrushy' WHERE t.id = 382");
        $this->addSql("UPDATE version t SET t.slug = 'hustachka-kolansk' WHERE t.id = 328");
        $this->addSql("UPDATE version t SET t.slug = 'isho-karavay-matnyavichy' WHERE t.id = 411");
        $this->addSql("UPDATE version t SET t.slug = 'kabardzinka-belaya-lagoyski' WHERE t.id = 102");
        $this->addSql("UPDATE version t SET t.slug = 'kachan-kapla-ncy' WHERE t.id = 351");
        $this->addSql("UPDATE version t SET t.slug = 'kachan-la-nica' WHERE t.id = 352");
        $this->addSql("UPDATE version t SET t.slug = 'kachan-levanova' WHERE t.id = 353");
        $this->addSql("UPDATE version t SET t.slug = 'kachan-yarca-ka' WHERE t.id = 354");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-dembrava' WHERE t.id = 191");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-grabava' WHERE t.id = 230");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-hodcy' WHERE t.id = 126");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-hoynicki' WHERE t.id = 88");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-ivanka-shchyna' WHERE t.id = 190");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-kapatkevichy' WHERE t.id = 71");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-kotchyna' WHERE t.id = 185");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-levashy' WHERE t.id = 115");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-levashy2' WHERE t.id = 206");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-mazyrski' WHERE t.id = 89");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-meshychy' WHERE t.id = 189");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-pogiry' WHERE t.id = 94");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-sinkevichy' WHERE t.id = 304");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-varatyn' WHERE t.id = 169");
        $this->addSql("UPDATE version t SET t.slug = 'kadrylya-vyalikiya-zimovishchy' WHERE t.id = 424");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka' WHERE t.id = 43");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-sinkevichy' WHERE t.id = 320");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-valoviki' WHERE t.id = 149");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-varatyn' WHERE t.id = 167");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-vugly' WHERE t.id = 87");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-zabroddze' WHERE t.id = 177");
        $this->addSql("UPDATE version t SET t.slug = 'kahanachka-zaluzze' WHERE t.id = 319");
        $this->addSql("UPDATE version t SET t.slug = 'kahanechka-vugly' WHERE t.id = 350");
        $this->addSql("UPDATE version t SET t.slug = 'kaketka-levashy' WHERE t.id = 55");
        $this->addSql("UPDATE version t SET t.slug = 'kaketka-zaazer-e' WHERE t.id = 136");
        $this->addSql("UPDATE version t SET t.slug = 'kalodachka-byasedavichy' WHERE t.id = 212");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-antanevichy' WHERE t.id = 2");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-asarevichy' WHERE t.id = 178");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-balashevichy' WHERE t.id = 213");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-markava' WHERE t.id = 384");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-shascisnopy' WHERE t.id = 76");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-shutavichy' WHERE t.id = 252");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-stayalava' WHERE t.id = 390");
        $this->addSql("UPDATE version t SET t.slug = 'karapet-lysy-yaminsk' WHERE t.id = 42");
        $this->addSql("UPDATE version t SET t.slug = 'karobachka' WHERE t.id = 181");
        $this->addSql("UPDATE version t SET t.slug = 'karobachka-pogiry' WHERE t.id = 91");
        $this->addSql("UPDATE version t SET t.slug = 'karobachka-polacki' WHERE t.id = 389");
        $this->addSql("UPDATE version t SET t.slug = 'karobachka-selishcha-barysa-ski' WHERE t.id = 192");
        $this->addSql("UPDATE version t SET t.slug = 'karobachka-yarca-ka' WHERE t.id = 16");
        $this->addSql("UPDATE version t SET t.slug = 'karobushka-sosny' WHERE t.id = 199");
        $this->addSql("UPDATE version t SET t.slug = 'kartuze-merkulavichy' WHERE t.id = 57");
        $this->addSql("UPDATE version t SET t.slug = 'karusel-zagor-e' WHERE t.id = 292");
        $this->addSql("UPDATE version t SET t.slug = 'kashel-kanatop' WHERE t.id = 426");
        $this->addSql("UPDATE version t SET t.slug = 'kaval' WHERE t.id = 40");
        $this->addSql("UPDATE version t SET t.slug = 'kaval-belaya-mazyrski' WHERE t.id = 53");
        $this->addSql("UPDATE version t SET t.slug = 'kaza' WHERE t.id = 15");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-ga-rylchycy' WHERE t.id = 344");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-i-kazel-charnagradz' WHERE t.id = 347");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-liplyany' WHERE t.id = 406");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-padgalle' WHERE t.id = 405");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-prusy' WHERE t.id = 346");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-shchytkavichy' WHERE t.id = 345");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-ty-shkavichy' WHERE t.id = 301");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-usveya' WHERE t.id = 289");
        $this->addSql("UPDATE version t SET t.slug = 'kaza-zalesse' WHERE t.id = 188");
        $this->addSql("UPDATE version t SET t.slug = 'kazak-alho-ka' WHERE t.id = 256");
        $this->addSql("UPDATE version t SET t.slug = 'kazak-cvecina' WHERE t.id = 284");
        $this->addSql("UPDATE version t SET t.slug = 'kazak-lyaha-cy' WHERE t.id = 334");
        $this->addSql("UPDATE version t SET t.slug = 'kazak-vyalikiya-kazly' WHERE t.id = 151");
        $this->addSql("UPDATE version t SET t.slug = 'kazel-syalec' WHERE t.id = 349");
        $this->addSql("UPDATE version t SET t.slug = 'kazel-trayana-ka' WHERE t.id = 348");
        $this->addSql("UPDATE version t SET t.slug = 'kitayanka-trasechanyaty' WHERE t.id = 143");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-bukcha' WHERE t.id = 399");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-muravanaya-ashmyanka' WHERE t.id = 84");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-pogiry' WHERE t.id = 90");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-rachen' WHERE t.id = 197");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-rama-shkava' WHERE t.id = 273");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-studzera-shchyna' WHERE t.id = 147");
        $this->addSql("UPDATE version t SET t.slug = 'krakavyak-zavaly' WHERE t.id = 355");
        $this->addSql("UPDATE version t SET t.slug = 'kru-ty-hacisla' WHERE t.id = 171");
        $this->addSql("UPDATE version t SET t.slug = 'krugavaya-byasedavichy' WHERE t.id = 214");
        $this->addSql("UPDATE version t SET t.slug = 'krutak' WHERE t.id = 72");
        $this->addSql("UPDATE version t SET t.slug = 'kryzhachok' WHERE t.id = 17");
        $this->addSql("UPDATE version t SET t.slug = 'kryzhachok-batchy' WHERE t.id = 312");
        $this->addSql("UPDATE version t SET t.slug = 'kryzhachok-vele-shchyna' WHERE t.id = 272");
        $this->addSql("UPDATE version t SET t.slug = 'kupchyki-vugly' WHERE t.id = 356");
        $this->addSql("UPDATE version t SET t.slug = 'kurachka-padarosk' WHERE t.id = 268");
        $this->addSql("UPDATE version t SET t.slug = 'lapci-celepuny-mikraraen-g-mazyr' WHERE t.id = 18");
        $this->addSql("UPDATE version t SET t.slug = 'lapci-shupeni' WHERE t.id = 282");
        $this->addSql("UPDATE version t SET t.slug = 'lasta-ka-pry-synak' WHERE t.id = 357");
        $this->addSql("UPDATE version t SET t.slug = 'licvin-alho-ka' WHERE t.id = 249");
        $this->addSql("UPDATE version t SET t.slug = 'licvina-brusy' WHERE t.id = 358");
        $this->addSql("UPDATE version t SET t.slug = 'lisica-muravanaya-ashmyanka' WHERE t.id = 262");
        $this->addSql("UPDATE version t SET t.slug = 'lisichka-staraya-rudnya' WHERE t.id = 266");
        $this->addSql("UPDATE version t SET t.slug = 'lyancey-budki' WHERE t.id = 425");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha' WHERE t.id = 49");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha2' WHERE t.id = 50");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha3' WHERE t.id = 116");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha4' WHERE t.id = 394");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-asavec' WHERE t.id = 67");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-ashmyany' WHERE t.id = 144");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-asina-ka' WHERE t.id = 415");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-bystryca' WHERE t.id = 232");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-chyrvonaya-slabada' WHERE t.id = 427");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-darasino' WHERE t.id = 402");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-dubrova' WHERE t.id = 217");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-galavenchycy' WHERE t.id = 215");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-garadzec' WHERE t.id = 216");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-gru-shka' WHERE t.id = 323");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-gryckavichy' WHERE t.id = 69");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-karo-chyna' WHERE t.id = 118");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-lasi' WHERE t.id = 154");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-metcha' WHERE t.id = 20");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-navayanchyna' WHERE t.id = 360");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-ni-ki' WHERE t.id = 361");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-palazhevichy' WHERE t.id = 364");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-plastok' WHERE t.id = 194");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-pyanki' WHERE t.id = 119");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-rachen' WHERE t.id = 362");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-sarachy' WHERE t.id = 359");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-sarachy2' WHERE t.id = 363");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-selishcha-barysa-ski' WHERE t.id = 117");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-sinkevichy' WHERE t.id = 330");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-stary-ya-daro-gi' WHERE t.id = 365");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-vyalyacichy' WHERE t.id = 366");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-zasecce' WHERE t.id = 120");
        $this->addSql("UPDATE version t SET t.slug = 'lyavoniha-zasecce2' WHERE t.id = 170");
        $this->addSql("UPDATE version t SET t.slug = 'lyudzvinka' WHERE t.id = 160");
        $this->addSql("UPDATE version t SET t.slug = 'magera-alho-ka' WHERE t.id = 153");
        $this->addSql("UPDATE version t SET t.slug = 'magera-nyamoyta' WHERE t.id = 279");
        $this->addSql("UPDATE version t SET t.slug = 'malvina-babichy' WHERE t.id = 23");
        $this->addSql("UPDATE version t SET t.slug = 'marusya-berazlyany' WHERE t.id = 308");
        $this->addSql("UPDATE version t SET t.slug = 'mastochak-selishcha-barysa-ski' WHERE t.id = 367");
        $this->addSql("UPDATE version t SET t.slug = 'matlet-antanevichy' WHERE t.id = 368");
        $this->addSql("UPDATE version t SET t.slug = 'matlet-lasi' WHERE t.id = 168");
        $this->addSql("UPDATE version t SET t.slug = 'matlet-prusy' WHERE t.id = 24");
        $this->addSql("UPDATE version t SET t.slug = 'matlet-zhmurnae' WHERE t.id = 293");
        $this->addSql("UPDATE version t SET t.slug = 'melnik' WHERE t.id = 25");
        $this->addSql("UPDATE version t SET t.slug = 'mesyac' WHERE t.id = 182");
        $this->addSql("UPDATE version t SET t.slug = 'mesyac-markava' WHERE t.id = 393");
        $this->addSql("UPDATE version t SET t.slug = 'mesyac-palichnae' WHERE t.id = 73");
        $this->addSql("UPDATE version t SET t.slug = 'mesyac-shascisnopy' WHERE t.id = 77");
        $this->addSql("UPDATE version t SET t.slug = 'mesyac-valosavichy' WHERE t.id = 205");
        $this->addSql("UPDATE version t SET t.slug = 'mikita' WHERE t.id = 21");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-ashmyany' WHERE t.id = 146");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-hilchycy' WHERE t.id = 416");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-novy-dvor' WHERE t.id = 260");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-selishcha-slucki' WHERE t.id = 369");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-semerniki' WHERE t.id = 259");
        $this->addSql("UPDATE version t SET t.slug = 'mikita-ty-shkavichy' WHERE t.id = 336");
        $this->addSql("UPDATE version t SET t.slug = 'milashka-valeykavichy' WHERE t.id = 187");
        $this->addSql("UPDATE version t SET t.slug = 'milen-syalec' WHERE t.id = 22");
        $this->addSql("UPDATE version t SET t.slug = 'mlynok-brusy' WHERE t.id = 370");
        $this->addSql("UPDATE version t SET t.slug = 'most-padarosk' WHERE t.id = 269");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica' WHERE t.id = 5");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica2' WHERE t.id = 81");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica3' WHERE t.id = 82");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica-lyady' WHERE t.id = 287");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica-selishcha-barysa-ski' WHERE t.id = 371");
        $this->addSql("UPDATE version t SET t.slug = 'myacelica-simanovichy' WHERE t.id = 59");
        $this->addSql("UPDATE version t SET t.slug = 'myadzvezhka-bystryca' WHERE t.id = 267");
        $this->addSql("UPDATE version t SET t.slug = 'na-cherave-kurycichy' WHERE t.id = 413");
        $this->addSql("UPDATE version t SET t.slug = 'na-novae-leta-svislach' WHERE t.id = 26");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-bukcha' WHERE t.id = 396");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-kuklichy' WHERE t.id = 233");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-metcha' WHERE t.id = 172");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-navaselki' WHERE t.id = 1");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-sinichyna' WHERE t.id = 204");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-yarca-ka' WHERE t.id = 44");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-zavaly' WHERE t.id = 60");
        $this->addSql("UPDATE version t SET t.slug = 'narechanka-zhmurnae' WHERE t.id = 296");
        $this->addSql("UPDATE version t SET t.slug = 'nazhnicy-astrazhanka' WHERE t.id = 421");
        $this->addSql("UPDATE version t SET t.slug = 'nochka' WHERE t.id = 51");
        $this->addSql("UPDATE version t SET t.slug = 'nochka-bukcha' WHERE t.id = 397");
        $this->addSql("UPDATE version t SET t.slug = 'nochka-slabada' WHERE t.id = 68");
        $this->addSql("UPDATE version t SET t.slug = 'nochka-vyaseya' WHERE t.id = 61");
        $this->addSql("UPDATE version t SET t.slug = 'nozhni-agarodniki' WHERE t.id = 422");
        $this->addSql("UPDATE version t SET t.slug = 'oyra' WHERE t.id = 74");
        $this->addSql("UPDATE version t SET t.slug = 'oyra-rama-shkava' WHERE t.id = 86");
        $this->addSql("UPDATE version t SET t.slug = 'oyra-senkava' WHERE t.id = 218");
        $this->addSql("UPDATE version t SET t.slug = 'oyra-slabada' WHERE t.id = 45");
        $this->addSql("UPDATE version t SET t.slug = 'oyra-slabada2' WHERE t.id = 62");
        $this->addSql("UPDATE version t SET t.slug = 'oyra-vyalikaya-gac' WHERE t.id = 318");
        $this->addSql("UPDATE version t SET t.slug = 'oysya-celepuny-mikraraen-g-mazyr' WHERE t.id = 27");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-bukcha' WHERE t.id = 398");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-dzyamenichy' WHERE t.id = 314");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-kazlo-shchyna' WHERE t.id = 46");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-lyuban' WHERE t.id = 195");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-selishcha-barysa-ski' WHERE t.id = 63");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-zabalac' WHERE t.id = 196");
        $this->addSql("UPDATE version t SET t.slug = 'padyspan-zhmurnae' WHERE t.id = 294");
        $this->addSql("UPDATE version t SET t.slug = 'padzikatr-selishcha-barysa-ski' WHERE t.id = 174");
        $this->addSql("UPDATE version t SET t.slug = 'pcichki-levashy' WHERE t.id = 30");
        $this->addSql("UPDATE version t SET t.slug = 'pcichki-vuc' WHERE t.id = 429");
        $this->addSql("UPDATE version t SET t.slug = 'polka' WHERE t.id = 103");
        $this->addSql("UPDATE version t SET t.slug = 'polka2' WHERE t.id = 104");
        $this->addSql("UPDATE version t SET t.slug = 'polka3' WHERE t.id = 135");
        $this->addSql("UPDATE version t SET t.slug = 'polka4' WHERE t.id = 184");
        $this->addSql("UPDATE version t SET t.slug = 'polka5' WHERE t.id = 392");
        $this->addSql("UPDATE version t SET t.slug = 'polka-acminava' WHERE t.id = 231");
        $this->addSql("UPDATE version t SET t.slug = 'polka-aranchycy' WHERE t.id = 80");
        $this->addSql("UPDATE version t SET t.slug = 'polka-arehava' WHERE t.id = 395");
        $this->addSql("UPDATE version t SET t.slug = 'polka-asavec' WHERE t.id = 222");
        $this->addSql("UPDATE version t SET t.slug = 'polka-asavec2' WHERE t.id = 224");
        $this->addSql("UPDATE version t SET t.slug = 'polka-babichy' WHERE t.id = 28");
        $this->addSql("UPDATE version t SET t.slug = 'polka-barodzichy' WHERE t.id = 237");
        $this->addSql("UPDATE version t SET t.slug = 'polka-belaya-mazyrski' WHERE t.id = 29");
        $this->addSql("UPDATE version t SET t.slug = 'polka-bukcha' WHERE t.id = 400");
        $this->addSql("UPDATE version t SET t.slug = 'polka-buyki' WHERE t.id = 245");
        $this->addSql("UPDATE version t SET t.slug = 'polka-byasedavichy' WHERE t.id = 164");
        $this->addSql("UPDATE version t SET t.slug = 'polka-byasedavichy2' WHERE t.id = 219");
        $this->addSql("UPDATE version t SET t.slug = 'polka-bystryca' WHERE t.id = 246");
        $this->addSql("UPDATE version t SET t.slug = 'polka-bystryca2' WHERE t.id = 247");
        $this->addSql("UPDATE version t SET t.slug = 'polka-chamyaryn' WHERE t.id = 403");
        $this->addSql("UPDATE version t SET t.slug = 'polka-garadok' WHERE t.id = 386");
        $this->addSql("UPDATE version t SET t.slug = 'polka-garadok2' WHERE t.id = 391");
        $this->addSql("UPDATE version t SET t.slug = 'polka-giry' WHERE t.id = 265");
        $this->addSql("UPDATE version t SET t.slug = 'polka-gorka' WHERE t.id = 243");
        $this->addSql("UPDATE version t SET t.slug = 'polka-gory' WHERE t.id = 221");
        $this->addSql("UPDATE version t SET t.slug = 'polka-kalchu-ny' WHERE t.id = 240");
        $this->addSql("UPDATE version t SET t.slug = 'polka-kanyuhi' WHERE t.id = 239");
        $this->addSql("UPDATE version t SET t.slug = 'polka-kapatkevichy' WHERE t.id = 420");
        $this->addSql("UPDATE version t SET t.slug = 'polka-karaneva' WHERE t.id = 134");
        $this->addSql("UPDATE version t SET t.slug = 'polka-kolansk' WHERE t.id = 305");
        $this->addSql("UPDATE version t SET t.slug = 'polka-krycha' WHERE t.id = 223");
        $this->addSql("UPDATE version t SET t.slug = 'polka-lan' WHERE t.id = 374");
        $this->addSql("UPDATE version t SET t.slug = 'polka-lelchycki' WHERE t.id = 162");
        $this->addSql("UPDATE version t SET t.slug = 'polka-liplyany' WHERE t.id = 435");
        $this->addSql("UPDATE version t SET t.slug = 'polka-macka-cy' WHERE t.id = 110");
        $this->addSql("UPDATE version t SET t.slug = 'polka-makanavichy' WHERE t.id = 433");
        $this->addSql("UPDATE version t SET t.slug = 'polka-metcha' WHERE t.id = 64");
        $this->addSql("UPDATE version t SET t.slug = 'polka-novaya-dubrova' WHERE t.id = 431");
        $this->addSql("UPDATE version t SET t.slug = 'polka-novaya-dubrova2' WHERE t.id = 438");
        $this->addSql("UPDATE version t SET t.slug = 'polka-nyastanavichy' WHERE t.id = 436");
        $this->addSql("UPDATE version t SET t.slug = 'polka-plastok' WHERE t.id = 198");
        $this->addSql("UPDATE version t SET t.slug = 'polka-plastok2' WHERE t.id = 202");
        $this->addSql("UPDATE version t SET t.slug = 'polka-pogiry' WHERE t.id = 93");
        $this->addSql("UPDATE version t SET t.slug = 'polka-ra-dastava' WHERE t.id = 163");
        $this->addSql("UPDATE version t SET t.slug = 'polka-radchyck' WHERE t.id = 316");
        $this->addSql("UPDATE version t SET t.slug = 'polka-razhanka' WHERE t.id = 242");
        $this->addSql("UPDATE version t SET t.slug = 'polka-rechyca' WHERE t.id = 317");
        $this->addSql("UPDATE version t SET t.slug = 'polka-selishcha-barysa-ski' WHERE t.id = 373");
        $this->addSql("UPDATE version t SET t.slug = 'polka-shutavichy' WHERE t.id = 234");
        $this->addSql("UPDATE version t SET t.slug = 'polka-shutavichy2' WHERE t.id = 244");
        $this->addSql("UPDATE version t SET t.slug = 'polka-shylavichy3' WHERE t.id = 432");
        $this->addSql("UPDATE version t SET t.slug = 'polka-shylavichy4' WHERE t.id = 434");
        $this->addSql("UPDATE version t SET t.slug = 'polka-sinki' WHERE t.id = 235");
        $this->addSql("UPDATE version t SET t.slug = 'polka-sipi-shchava' WHERE t.id = 288");
        $this->addSql("UPDATE version t SET t.slug = 'polka-skibichy' WHERE t.id = 306");
        $this->addSql("UPDATE version t SET t.slug = 'polka-skibichy2' WHERE t.id = 309");
        $this->addSql("UPDATE version t SET t.slug = 'polka-skibichy3' WHERE t.id = 325");
        $this->addSql("UPDATE version t SET t.slug = 'polka-skibichy4' WHERE t.id = 326");
        $this->addSql("UPDATE version t SET t.slug = 'polka-skirmantava' WHERE t.id = 375");
        $this->addSql("UPDATE version t SET t.slug = 'polka-stayki' WHERE t.id = 133");
        $this->addSql("UPDATE version t SET t.slug = 'polka-svislach' WHERE t.id = 241");
        $this->addSql("UPDATE version t SET t.slug = 'polka-ugalec' WHERE t.id = 307");
        $this->addSql("UPDATE version t SET t.slug = 'polka-valeykavichy' WHERE t.id = 236");
        $this->addSql("UPDATE version t SET t.slug = 'polka-valosavichy' WHERE t.id = 437");
        $this->addSql("UPDATE version t SET t.slug = 'polka-vyalikiya-kazly' WHERE t.id = 238");
        $this->addSql("UPDATE version t SET t.slug = 'polka-vyarechcha' WHERE t.id = 275");
        $this->addSql("UPDATE version t SET t.slug = 'polka-vyarechcha2' WHERE t.id = 276");
        $this->addSql("UPDATE version t SET t.slug = 'polka-vynishchy' WHERE t.id = 376");
        $this->addSql("UPDATE version t SET t.slug = 'polka-zagoryny' WHERE t.id = 439");
        $this->addSql("UPDATE version t SET t.slug = 'polka-zavaly' WHERE t.id = 372");
        $this->addSql("UPDATE version t SET t.slug = 'polka-zhmurnae' WHERE t.id = 295");
        $this->addSql("UPDATE version t SET t.slug = 'prype-ki-senkava' WHERE t.id = 225");
        $this->addSql("UPDATE version t SET t.slug = 'pryspe-ra-dastava' WHERE t.id = 300");
        $this->addSql("UPDATE version t SET t.slug = 'pyachy-bliny' WHERE t.id = 31");
        $this->addSql("UPDATE version t SET t.slug = 'raskamarycki-byasedavichy' WHERE t.id = 226");
        $this->addSql("UPDATE version t SET t.slug = 'raskamarycki-gulyaeva' WHERE t.id = 377");
        $this->addSql("UPDATE version t SET t.slug = 'raspaloska-vyarechcha' WHERE t.id = 277");
        $this->addSql("UPDATE version t SET t.slug = 'rechanka-zamshany' WHERE t.id = 321");
        $this->addSql("UPDATE version t SET t.slug = 'reshatuha-morach' WHERE t.id = 381");
        $this->addSql("UPDATE version t SET t.slug = 'ruskaga-andrushy' WHERE t.id = 379");
        $this->addSql("UPDATE version t SET t.slug = 'ruskaga-babki' WHERE t.id = 378");
        $this->addSql("UPDATE version t SET t.slug = 'ruskaga-la-darazh' WHERE t.id = 333");
        $this->addSql("UPDATE version t SET t.slug = 'ruskaga-prusy' WHERE t.id = 380");
        $this->addSql("UPDATE version t SET t.slug = 'ruskaga-razhanka' WHERE t.id = 263");
        $this->addSql("UPDATE version t SET t.slug = 'serbiyanka' WHERE t.id = 32");
        $this->addSql("UPDATE version t SET t.slug = 'serbiyanka2' WHERE t.id = 47");
        $this->addSql("UPDATE version t SET t.slug = 'serbiyanka3' WHERE t.id = 99");
        $this->addSql("UPDATE version t SET t.slug = 'serbiyanka4' WHERE t.id = 100");
        $this->addSql("UPDATE version t SET t.slug = 'serbiyanka-kraglevichy' WHERE t.id = 332");
        $this->addSql("UPDATE version t SET t.slug = 'seyma-varvara-ka' WHERE t.id = 175");
        $this->addSql("UPDATE version t SET t.slug = 'shahcer-babichy' WHERE t.id = 428");
        $this->addSql("UPDATE version t SET t.slug = 'sharlatan-novy-dvor' WHERE t.id = 85");
        $this->addSql("UPDATE version t SET t.slug = 'shastak-akuneva' WHERE t.id = 271");
        $this->addSql("UPDATE version t SET t.slug = 'shastak-macka-cy' WHERE t.id = 186");
        $this->addSql("UPDATE version t SET t.slug = 'shchyglik' WHERE t.id = 158");
        $this->addSql("UPDATE version t SET t.slug = 'shen-machul' WHERE t.id = 38");
        $this->addSql("UPDATE version t SET t.slug = 'shera-talmachava' WHERE t.id = 203");
        $this->addSql("UPDATE version t SET t.slug = 'sherh-macka-cy' WHERE t.id = 137");
        $this->addSql("UPDATE version t SET t.slug = 'shesc-da-galesse' WHERE t.id = 418");
        $this->addSql("UPDATE version t SET t.slug = 'shesc-lyubavichy' WHERE t.id = 419");
        $this->addSql("UPDATE version t SET t.slug = 'stradaniya' WHERE t.id = 33");
        $this->addSql("UPDATE version t SET t.slug = 'stradaniya-mazali' WHERE t.id = 401");
        $this->addSql("UPDATE version t SET t.slug = 'stradaniya-stary-vostra' WHERE t.id = 388");
        $this->addSql("UPDATE version t SET t.slug = 'stradaniya-syadzelniki' WHERE t.id = 253");
        $this->addSql("UPDATE version t SET t.slug = 'subota' WHERE t.id = 34");
        $this->addSql("UPDATE version t SET t.slug = 'subota2' WHERE t.id = 183");
        $this->addSql("UPDATE version t SET t.slug = 'subota-markavichy' WHERE t.id = 159");
        $this->addSql("UPDATE version t SET t.slug = 'subota-zagoryny' WHERE t.id = 48");
        $this->addSql("UPDATE version t SET t.slug = 'svistuha' WHERE t.id = 98");
        $this->addSql("UPDATE version t SET t.slug = 'syamena-na-lambava' WHERE t.id = 165");
        $this->addSql("UPDATE version t SET t.slug = 'syamena-na-yushkavichy' WHERE t.id = 201");
        $this->addSql("UPDATE version t SET t.slug = 'ta-kachyki-ashmyany' WHERE t.id = 261");
        $this->addSql("UPDATE version t SET t.slug = 'ta-kachyki-bystryca' WHERE t.id = 257");
        $this->addSql("UPDATE version t SET t.slug = 'ta-kachyki-vaclavova' WHERE t.id = 281");
        $this->addSql("UPDATE version t SET t.slug = 'tanec-backo-maladoy-kramno' WHERE t.id = 299");
        $this->addSql("UPDATE version t SET t.slug = 'tanec-maladoy-z-velenam-velyamo-vichy' WHERE t.id = 303");
        $this->addSql("UPDATE version t SET t.slug = 'tanec-svekryvi-velyamo-vichy' WHERE t.id = 302");
        $this->addSql("UPDATE version t SET t.slug = 'tanec-z-hlebam-krasnica' WHERE t.id = 409");
        $this->addSql("UPDATE version t SET t.slug = 'tanec-z-hustachkay-zaluzze' WHERE t.id = 324");
        $this->addSql("UPDATE version t SET t.slug = 'tapor-vyarechcha' WHERE t.id = 278");
        $this->addSql("UPDATE version t SET t.slug = 'ternycya-kobrynski' WHERE t.id = 313");
        $this->addSql("UPDATE version t SET t.slug = 'trasuha-karpavichy' WHERE t.id = 129");
        $this->addSql("UPDATE version t SET t.slug = 'trasuha-taluc' WHERE t.id = 131");
        $this->addSql("UPDATE version t SET t.slug = 'trasuha-vileyka' WHERE t.id = 130");
        $this->addSql("UPDATE version t SET t.slug = 'trayan-shutavichy' WHERE t.id = 35");
        $this->addSql("UPDATE version t SET t.slug = 'trybushki-radchyck' WHERE t.id = 329");
        $this->addSql("UPDATE version t SET t.slug = 'trydanu-pagost' WHERE t.id = 410");
        $this->addSql("UPDATE version t SET t.slug = 'tryndychki-zaluzze' WHERE t.id = 335");
        $this->addSql("UPDATE version t SET t.slug = 'va-sadu-li-gayna' WHERE t.id = 138");
        $this->addSql("UPDATE version t SET t.slug = 'va-sadu-li-kramno' WHERE t.id = 315");
        $this->addSql("UPDATE version t SET t.slug = 'va-sadu-li-lambava' WHERE t.id = 166");
        $this->addSql("UPDATE version t SET t.slug = 'va-sadu-li-selishcha-barysa-ski' WHERE t.id = 11");
        $this->addSql("UPDATE version t SET t.slug = 'va-sadu-li-zhytkavicki' WHERE t.id = 161");
        $this->addSql("UPDATE version t SET t.slug = 'valgerka-macka-cy' WHERE t.id = 112");
        $this->addSql("UPDATE version t SET t.slug = 'vals' WHERE t.id = 8");
        $this->addSql("UPDATE version t SET t.slug = 'vals2' WHERE t.id = 109");
        $this->addSql("UPDATE version t SET t.slug = 'vals3' WHERE t.id = 207");
        $this->addSql("UPDATE version t SET t.slug = 'vals-brusy' WHERE t.id = 83");
        $this->addSql("UPDATE version t SET t.slug = 'vals-dzyamenichy' WHERE t.id = 327");
        $this->addSql("UPDATE version t SET t.slug = 'vals-nisimkavichy' WHERE t.id = 52");
        $this->addSql("UPDATE version t SET t.slug = 'vals-vugly' WHERE t.id = 337");
        $this->addSql("UPDATE version t SET t.slug = 'vals-zavaly' WHERE t.id = 10");
        $this->addSql("UPDATE version t SET t.slug = 'vasadulya' WHERE t.id = 156");
        $this->addSql("UPDATE version t SET t.slug = 'vasadulya-prusy' WHERE t.id = 342");
        $this->addSql("UPDATE version t SET t.slug = 'vasadulya-skibichy' WHERE t.id = 311");
        $this->addSql("UPDATE version t SET t.slug = 'vasilko-gapachok-karaneva' WHERE t.id = 132");
        $this->addSql("UPDATE version t SET t.slug = 'vengerka-gudagay' WHERE t.id = 180");
        $this->addSql("UPDATE version t SET t.slug = 'verabey' WHERE t.id = 12");
        $this->addSql("UPDATE version t SET t.slug = 'verabey-pratasy' WHERE t.id = 407");
        $this->addSql("UPDATE version t SET t.slug = 'verch-macka-cy' WHERE t.id = 111");
        $this->addSql("UPDATE version t SET t.slug = 'vishanka' WHERE t.id = 108");
        $this->addSql("UPDATE version t SET t.slug = 'vishanka-gra-zhyshki' WHERE t.id = 113");
        $this->addSql("UPDATE version t SET t.slug = 'vishanka-shutavichy' WHERE t.id = 122");
        $this->addSql("UPDATE version t SET t.slug = 'voyra' WHERE t.id = 155");
        $this->addSql("UPDATE version t SET t.slug = 'voyra-zaazer-e' WHERE t.id = 128");
        $this->addSql("UPDATE version t SET t.slug = 'yablychka-kazlovichy' WHERE t.id = 274");
        $this->addSql("UPDATE version t SET t.slug = 'yablychka-shypilavichy' WHERE t.id = 200");
        $this->addSql("UPDATE version t SET t.slug = 'yurachka' WHERE t.id = 39");
        $this->addSql("UPDATE version t SET t.slug = 'zaviruha-budki' WHERE t.id = 417");
        $this->addSql("UPDATE version t SET t.slug = 'zaychyk-asavec' WHERE t.id = 227");
        $this->addSql("UPDATE version t SET t.slug = 'zaychyk-celepuny-mikraraen-g-mazyr' WHERE t.id = 4");
        $this->addSql("UPDATE version t SET t.slug = 'zaychyk-rama-shkava' WHERE t.id = 290");
        $this->addSql("UPDATE version t SET t.slug = 'zaychyk-zabroddze' WHERE t.id = 408");
        $this->addSql("UPDATE version t SET t.slug = 'zaychyk-zhmurnae' WHERE t.id = 297");
        $this->addSql("UPDATE version t SET t.slug = 'zhabka-babirova' WHERE t.id = 211");
        $this->addSql("UPDATE version t SET t.slug = 'zhabka-byalya-shchyna' WHERE t.id = 152");
        $this->addSql("UPDATE version t SET t.slug = 'zhabka-byalya-shchyna2' WHERE t.id = 258");
        $this->addSql("UPDATE version t SET t.slug = 'zhabka-gubina' WHERE t.id = 280");
        $this->addSql("UPDATE version t SET t.slug = 'zhabka-pastavichy' WHERE t.id = 343");
        $this->addSql("UPDATE version t SET t.slug = 'zhora-palesse' WHERE t.id = 414");
        $this->addSql("UPDATE version t SET t.slug = 'zhuravel' WHERE t.id = 14");
        $this->addSql("UPDATE version t SET t.slug = 'zhydovachka-metcha' WHERE t.id = 141");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
