<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113001347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO Topic (`id`, `id_cate`, `id_user`, `titre_topic`, `contenu_topic`, `date_heure_topic`) VALUES ("1", "1", "1", "Commencer le Skate ?", "Alors a votre avis ?", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Topic (`id`, `id_cate`, `id_user`, `titre_topic`, `contenu_topic`, `date_heure_topic`) VALUES ("2", "1", "2", "Vous courez combien de km en 30 minutes ?", "Perso 2km et vous ?", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Topic (`id`, `id_cate`, `id_user`, `titre_topic`, `contenu_topic`, `date_heure_topic`) VALUES ("3", "2", "4", "Besoin d\'aide pour l\'anglais", "Quelqu\'un de dispo ?", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Topic (`id`, `id_cate`, `id_user`, `titre_topic`, `contenu_topic`, `date_heure_topic`) VALUES ("4", "3", "1", "Tuto Symfony", "En construction", "2021-01-12 23:02:50")');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
