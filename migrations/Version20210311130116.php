<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311130116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id_com INT AUTO_INCREMENT NOT NULL, id_plat INT NOT NULL, nom_article VARCHAR(255) NOT NULL, id_client INT NOT NULL, nom_client VARCHAR(255) NOT NULL, date DATETIME NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_com)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id_plat INT AUTO_INCREMENT NOT NULL, nom VARCHAR(64) NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, id_cat INT NOT NULL, img_path VARCHAR(255) NOT NULL, PRIMARY KEY(id_plat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id_user INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(64) NOT NULL, nom VARCHAR(64) NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(64) NOT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
