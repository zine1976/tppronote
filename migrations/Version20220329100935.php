<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329100935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD prof_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF966E851E1D FOREIGN KEY (prof_id_id) REFERENCES prof (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF966E851E1D ON classe (prof_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF966E851E1D');
        $this->addSql('DROP INDEX UNIQ_8F87BF966E851E1D ON classe');
        $this->addSql('ALTER TABLE classe DROP prof_id_id');
    }
}
