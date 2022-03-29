<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329100557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96C8121CE9');
        $this->addSql('DROP INDEX UNIQ_8F87BF96C8121CE9 ON classe');
        $this->addSql('ALTER TABLE classe DROP nom_id, DROP prof_id');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7C8121CE9');
        $this->addSql('DROP INDEX UNIQ_ECA105F7C8121CE9 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP nom_id');
        $this->addSql('ALTER TABLE note DROP date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD nom_id INT NOT NULL, ADD prof_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96C8121CE9 FOREIGN KEY (nom_id) REFERENCES eleve (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF96C8121CE9 ON classe (nom_id)');
        $this->addSql('ALTER TABLE eleve ADD nom_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7C8121CE9 FOREIGN KEY (nom_id) REFERENCES note (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ECA105F7C8121CE9 ON eleve (nom_id)');
        $this->addSql('ALTER TABLE note ADD date DATE NOT NULL');
    }
}
