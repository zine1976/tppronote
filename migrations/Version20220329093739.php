<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329093739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F46CD258');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP INDEX IDX_CFBDFA14F46CD258 ON note');
        $this->addSql('ALTER TABLE note DROP matiere_id');
        $this->addSql('ALTER TABLE prof DROP FOREIGN KEY FK_5BBA70BBC8121CE9');
        $this->addSql('DROP INDEX UNIQ_5BBA70BBC8121CE9 ON prof');
        $this->addSql('ALTER TABLE prof ADD nom VARCHAR(255) NOT NULL, DROP nom_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE note ADD matiere_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14F46CD258 ON note (matiere_id)');
        $this->addSql('ALTER TABLE prof ADD nom_id INT NOT NULL, DROP nom');
        $this->addSql('ALTER TABLE prof ADD CONSTRAINT FK_5BBA70BBC8121CE9 FOREIGN KEY (nom_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5BBA70BBC8121CE9 ON prof (nom_id)');
    }
}
