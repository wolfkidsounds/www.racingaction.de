<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529155159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Make things nullbar';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE location location LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE date_end date_end DATE DEFAULT NULL, CHANGE registration registration VARCHAR(255) DEFAULT NULL, CHANGE organizers organizers LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event CHANGE type type VARCHAR(255) NOT NULL, CHANGE date_end date_end DATE NOT NULL, CHANGE registration registration VARCHAR(255) NOT NULL, CHANGE organizers organizers LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE location location VARCHAR(255) NOT NULL');
    }
}
