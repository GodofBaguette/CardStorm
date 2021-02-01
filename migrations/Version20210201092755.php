<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201092755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_collection_carte (carte_collection_id INT NOT NULL, carte_id INT NOT NULL, INDEX IDX_25EAAD63FF8F9E1D (carte_collection_id), INDEX IDX_25EAAD63C9C7CEB6 (carte_id), PRIMARY KEY(carte_collection_id, carte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_collection_carte ADD CONSTRAINT FK_25EAAD63FF8F9E1D FOREIGN KEY (carte_collection_id) REFERENCES carte_collection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carte_collection_carte ADD CONSTRAINT FK_25EAAD63C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE carte_collection_carte');
    }
}
