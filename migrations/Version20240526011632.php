<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240526011632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Event Korrektur und Erweiterungen';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD date_time_arrival DATETIME DEFAULT NULL, ADD date_time_departure DATETIME DEFAULT NULL, ADD links JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', DROP date_time_arriving, DROP date_time_leaving, DROP link_url, CHANGE price_visitor price_visitor DOUBLE PRECISION DEFAULT NULL, CHANGE price_rider price_rider DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD date_time_arriving DATETIME DEFAULT NULL, ADD date_time_leaving DATETIME DEFAULT NULL, ADD link_url VARCHAR(255) DEFAULT NULL, DROP date_time_arrival, DROP date_time_departure, DROP links, CHANGE price_visitor price_visitor VARCHAR(255) DEFAULT NULL, CHANGE price_rider price_rider VARCHAR(255) DEFAULT NULL');
    }
}
