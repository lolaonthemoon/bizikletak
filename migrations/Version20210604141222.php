<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604141222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC3780708A0E0');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC3780708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC3780708A0E0');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC3780708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
