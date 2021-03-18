<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313123612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY produits_categories_id_fk');
        $this->addSql('DROP INDEX IDX_BE2DDF8CFAABF2 ON produits');
        $this->addSql('ALTER TABLE produits CHANGE id_cat id_cat INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits CHANGE id_cat id_cat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT produits_categories_id_fk FOREIGN KEY (id_cat) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CFAABF2 ON produits (id_cat)');
    }
}
