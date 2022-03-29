<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329090210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prof ADD nom_id INT NOT NULL, DROP nom');
        $this->addSql('ALTER TABLE prof ADD CONSTRAINT FK_5BBA70BBC8121CE9 FOREIGN KEY (nom_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5BBA70BBC8121CE9 ON prof (nom_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prof DROP FOREIGN KEY FK_5BBA70BBC8121CE9');
        $this->addSql('DROP INDEX UNIQ_5BBA70BBC8121CE9 ON prof');
        $this->addSql('ALTER TABLE prof ADD nom VARCHAR(255) NOT NULL, DROP nom_id');
    }
}
