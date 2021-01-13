<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113011047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO Message (`id`, `id_topic`, `id_user`, `contenu_mess`, `date_heure_mess`) VALUES ("1", "1", "1", "Non c\'est démodé mec", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Message (`id`, `id_topic`, `id_user`, `contenu_mess`, `date_heure_mess`) VALUES ("2", "1", "2", "Même mas 1", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Message (`id`, `id_topic`, `id_user`, `contenu_mess`, `date_heure_mess`) VALUES ("3", "2", "4", "je donne du soutien", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Message (`id`, `id_topic`, `id_user`, `contenu_mess`, `date_heure_mess`) VALUES ("4", "3", "1", "Il arrive quand le tuto ?", "2021-01-12 23:02:50")');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
