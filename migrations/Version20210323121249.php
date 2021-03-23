<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323121249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes (id_com INT AUTO_INCREMENT NOT NULL, id_plat INT DEFAULT NULL, id_client INT DEFAULT NULL, nom_plat VARCHAR(255) NOT NULL, nom_client VARCHAR(255) NOT NULL, date DATETIME NOT NULL, prix INT NOT NULL, INDEX IDX_35D4282CAB18BE05 (id_plat), INDEX IDX_35D4282CE173B1B8 (id_client), PRIMARY KEY(id_com)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CAB18BE05 FOREIGN KEY (id_plat) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CE173B1B8 FOREIGN KEY (id_client) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commandes');
    }
}
