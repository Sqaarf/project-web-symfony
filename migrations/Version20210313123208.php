<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313123208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP id_plat');
        $this->addSql('ALTER TABLE produits CHANGE id_cat id_cat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits RENAME INDEX produits_categories_id_fk TO IDX_BE2DDF8CFAABF2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD id_plat INT NOT NULL');
        $this->addSql('ALTER TABLE produits CHANGE id_cat id_cat INT NOT NULL');
        $this->addSql('ALTER TABLE produits RENAME INDEX idx_be2ddf8cfaabf2 TO produits_categories_id_fk');
    }
}
