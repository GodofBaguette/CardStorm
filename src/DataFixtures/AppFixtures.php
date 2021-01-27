<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        // fixtures de la table User
        $user = new User();
        $user->setPseudo('jj55');
        $user->setEmail('jean@jean.fr');
        $user->setNom('Joli');
        $user->setPrenom('Jean');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'jean'));
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);
        $manager->flush();


        $user1 = new User();
        $user1->setPseudo('Nico55');
        $user1->setEmail('nico@nico.fr');
        $user1->setNom('Frey');
        $user1->setPrenom('Nico');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1,'nico'));
        $user1->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $manager->persist($user1);
        $manager->flush();


        $user2 = new User();
        $user2->setPseudo('bibi55');
        $user2->setEmail('bibi@bibi.fr');
        $user2->setNom('Bignouf');
        $user2->setPrenom('Bino');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2,'bibi'));
        $user2->setRoles(["ROLE_USER"]);
        $manager->persist($user2);
        $manager->flush();


        // fixtures de la table carte yu gi oh = ygo  db = dragonball

        $ygo = new Carte();
        $ygo->setNom('slifer le dragon céleste');
        $ygo->setStatistique('ATK/X000  DEF/X000');
        $ygo->setCaracteristique("Les cieux se déchirent et le tonnerre gronde, annonçant la venue de cette ancienne créature, et l'aube du vrai pouvoir.");
        $ygo->setType('[BÊTE DIVINE]');
        $ygo->setSerie('YGLD');
        $ygo->setNumero('FRG01');
        $ygo->setNomphoto('slifer');
        $manager->persist($ygo);
        $manager->flush();

        $ygo1 = new Carte();
        $ygo1->setNom('obelisk le tourmenteur');
        $ygo1->setStatistique('ATK/4000  DEF/4000');
        $ygo1->setCaracteristique("La descente de cette puissante créature peut être annoncée par des vents brûlants et des terres dévastées. Et avec la venue de cette horreur, ceux qui auront survécu connaîtront la vraie signification du sommeil éternel.");
        $ygo1->setType('[BÊTE DIVINE]');
        $ygo1->setSerie('YGLD');
        $ygo1->setNumero('FRG02');
        $ygo1->setNomphoto('obelisk');
        $manager->persist($ygo1);
        $manager->flush();

        $ygo3 = new Carte();
        $ygo3->setNom('le dragon ailé de râ');
        $ygo3->setStatistique('ATK/ ? DEF/ ?');
        $ygo3->setCaracteristique("Le chant des esprits d'une créature surpuissante qui règne sur le monde mystique.");
        $ygo3->setType('[BÊTE DIVINE]');
        $ygo3->setSerie('YGLD');
        $ygo3->setNumero('FRG03');
        $ygo3->setNomphoto('ra');
        $manager->persist($ygo3);
        $manager->flush();

        $ygo4 = new Carte();
        $ygo4->setNom('magicien sombre');
        $ygo4->setStatistique('ATK/2500  DEF/2100');
        $ygo4->setCaracteristique("Mage suprême en termes d'attaque et de défense.");
        $ygo4->setType('[MAGICIEN]');
        $ygo4->setSerie('YGLD');
        $ygo4->setNumero('FR03');
        $ygo4->setNomphoto('magicien');
        $manager->persist($ygo4);
        $manager->flush();

        $ygo2 = new Carte();
        $ygo2->setNom('kuriboh');
        $ygo2->setStatistique('ATK/300  DEF/200');
        $ygo2->setCaracteristique("Durant le tour de votre adversaire, au calcul des dommages : vous pouvez défausser cette carte ; vous ne recevez aucun dommage de combat  de ce combat (ceci est un Effet Rapide)");
        $ygo2->setType('[DEMON/EFFET]');
        $ygo2->setSerie('YGLD');
        $ygo2->setNumero('FRB15');
        $ygo2->setNomphoto('kuriboh');
        $manager->persist($ygo2);
        $manager->flush();



        $db = new Carte();
        $db->setNom("hit le tueur à gages");
        $db->setStatistique('PUISSANCE 10000 à 15000');
        $db->setCaracteristique("
        NON ÉVEIL 
        AUTO Quand cette carte attaque, elle gagne +5000 de puissance pour toute la durée du tour.
        
        ÉVEIL
        AUTO Quand cette carte attaque, piochez une carte, et elle gagne +5000 de puissance pour toute la durée du combat.
        AUTO - UNE FOIS PAR TOUR Quand votre adversaire active une BLOQUEUR, vous pouvez placer une carte rouge depuis votre mais dans votre Zone de Dispersion. Si vous faites ainsi, annulez ce BLOQUEUR .");
        $db->setType('LEADER');
        $db->setSerie('BT1');
        $db->setNumero('3');
        $db->setNomphoto('hitleader');
        $db->setRarete('UC');
        $manager->persist($db);
        $manager->flush();

        $db1 = new Carte();
        $db1->setNom("son goku super saiyan bleu");
        $db1->setStatistique('PUISSANCE 10000 à 15000');
        $db1->setCaracteristique("
        NON ÉVEIL 
        AUTO Quand cette carte attaque, elle gagne +1000 de puissance pour chaque source d'énergie que vous avez, pour toute la durée du tour.
        
        ÉVEIL
        PERMANENT Quand vous avez sept sources d'énergie ou plus cette carte gagne REPLIQUE (une fois par tour, quand cette carte attaque, passez la en mode Action après le combat).
        AUTO – UNE FOIS PAR TOUR Quand cette carte attaque, piochez une carte. Puis, cette carte gagne +1000 de puissance pour chaque source d'énergie que vous avez, pour toute la durée du tour");
        $db1->setType('LEADER');
        $db1->setSerie('BT1');
        $db1->setNumero('30');
        $db1->setNomphoto('gokubleuleader');
        $db1->setRarete('UC');
        $manager->persist($db1);
        $manager->flush();

        $db2 = new Carte();
        $db2->setNom("son goku super saiyan divin");
        $db2->setStatistique('PUISSANCE 10000 à 15000');
        $db2->setCaracteristique("
        DOUBLE FRAPPE (cette carte inflige 2 dégâts au lieu de 1)
        AUTO Quand cette carte attaque, piochez une carte.");
        $db2->setType('LEADER');
        $db2->setSerie('BT1');
        $db2->setNumero('56');
        $db2->setNomphoto('gokudivinleader');
        $db2->setRarete('UC');
        $manager->persist($db2);
        $manager->flush();

        $db3 = new Carte();
        $db3->setNom("Son gohan puissance maximum");
        $db3->setStatistique('PUISSANCE 10000 à 15000');
        $db3->setCaracteristique("
        NON ÉVEIL
        AUTO Quand cette carte attaque, si vous avez plus de points de vie que votre adversaire, piochez une carte.
        
        ÉVEIL
        AUTO Quand cette carte attaque, piochez une carte. ACTIVATION : PRINCIPALE UNE FOIS PAR TOUR 6 : Choisissez toutes les cartes de combat de votre adversaire et mettez les KO.");
        $db3->setType('LEADER');
        $db3->setSerie('BT1');
        $db3->setNumero('58');
        $db3->setNomphoto('gohanleader');
        $db3->setRarete('UC');
        $manager->persist($db3);
        $manager->flush();

        $db4 = new Carte();
        $db4->setNom("broly super saiyan légendaire");
        $db4->setStatistique('PUISSANCE 10000 à 15000');
        $db4->setCaracteristique("
        NON ÉVEIL
        PERMANENT Cette carte ne peut pas attaquer de cartes de Combat.
        AUTO Quand cette carte attaque, chaque joueur choisit une carte de sa main et la place dans sa Zone de Dispersion.
        
        ÉVEIL
        AUTO Quand cette carte attaque, piochez une carte. Puis chaque joueur choisit une carte de sa main et la place dans sa Zone de Dispersion.");
        $db4->setType('LEADER');
        $db4->setSerie('BT1');
        $db4->setNumero('57');
        $db4->setNomphoto('brolyleader');
        $db4->setRarete('R');
        $manager->persist($db4);
        $manager->flush();


        
    }
}
