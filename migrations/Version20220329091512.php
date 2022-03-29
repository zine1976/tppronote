<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329091512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD nom_id INT NOT NULL, DROP nom');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96C8121CE9 FOREIGN KEY (nom_id) REFERENCES eleve (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF96C8121CE9 ON classe (nom_id)');
        $this->addSql('ALTER TABLE eleve ADD nom_id INT NOT NULL, DROP nom');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7C8121CE9 FOREIGN KEY (nom_id) REFERENCES note (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ECA105F7C8121CE9 ON eleve (nom_id)');
        $this->addSql('ALTER TABLE matiere DROP nom');
        $this->addSql('ALTER TABLE note ADD matiere_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14F46CD258 ON note (matiere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96C8121CE9');
        $this->addSql('DROP INDEX UNIQ_8F87BF96C8121CE9 ON classe');
        $this->addSql('ALTER TABLE classe ADD nom VARCHAR(255) NOT NULL, DROP nom_id');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7C8121CE9');
        $this->addSql('DROP INDEX UNIQ_ECA105F7C8121CE9 ON eleve');
        $this->addSql('ALTER TABLE eleve ADD nom VARCHAR(255) NOT NULL, DROP nom_id');
        $this->addSql('ALTER TABLE matiere ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F46CD258');
        $this->addSql('DROP INDEX IDX_CFBDFA14F46CD258 ON note');
        $this->addSql('ALTER TABLE note DROP matiere_id');
    }
}
