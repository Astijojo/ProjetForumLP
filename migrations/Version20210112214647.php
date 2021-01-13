<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112214647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO Categorie (`id`, `nom_cate`, `created_at`) VALUES ("1", "Sport", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Categorie (`id`, `nom_cate`, `created_at`) VALUES ("2", "Cours", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Categorie (`id`, `nom_cate`, `created_at`) VALUES ("3", "Info", "2021-01-12 23:02:50")');
        $this->addSql('INSERT INTO Categorie (`id`, `nom_cate`, `created_at`) VALUES ("4", "Blabla", "2021-01-12 23:02:50")');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
