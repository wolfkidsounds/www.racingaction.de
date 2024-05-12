<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512211349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Neue Properties (Props) -> Eigenschaften für Event';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD type VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, ADD date_start DATE NOT NULL, ADD date_end DATE NOT NULL, ADD price_visitor VARCHAR(255) DEFAULT NULL, ADD price_rider VARCHAR(255) DEFAULT NULL, ADD date_time_arriving DATETIME DEFAULT NULL, ADD date_time_riders_breefing DATETIME DEFAULT NULL, ADD date_time_leaving DATETIME DEFAULT NULL, ADD classes VARCHAR(255) DEFAULT NULL, ADD registration VARCHAR(255) NOT NULL, ADD link_url VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, DROP date_time_begin, DROP is_open_end, CHANGE date_time_end date_time_start_visitor DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD date_time_begin DATETIME NOT NULL, ADD date_time_end DATETIME DEFAULT NULL, ADD is_open_end TINYINT(1) NOT NULL, DROP type, DROP location, DROP date_start, DROP date_end, DROP price_visitor, DROP price_rider, DROP date_time_start_visitor, DROP date_time_arriving, DROP date_time_riders_breefing, DROP date_time_leaving, DROP classes, DROP registration, DROP link_url, DROP description');
    }
}
