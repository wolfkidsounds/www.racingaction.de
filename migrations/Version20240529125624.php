<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529125624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Neue Event Properties und Remapping.';
    }

    public function up(Schema $schema): void
    {
        // neue properties
        $this->addSql('ALTER TABLE event 
            ADD is_all_day TINYINT(1) DEFAULT NULL, 
            ADD schedule LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', 
            ADD visitor_price DOUBLE PRECISION DEFAULT NULL, 
            ADD visitor_start DATETIME DEFAULT NULL, 
            ADD rider_classes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', 
            ADD rider_price DOUBLE PRECISION DEFAULT NULL, 
            ADD rider_start DATETIME DEFAULT NULL, 
            ADD rider_breefing DATETIME DEFAULT NULL, 
            ADD rider_end DATETIME DEFAULT NULL, 
            ADD organizers LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', 
            ADD websites LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', 
            ADD visibility VARCHAR(255) NOT NULL, 
            ADD status VARCHAR(255) NOT NULL, 
            ADD rider_registration LONGTEXT DEFAULT NULL'
        );

        // remapping
        $this->addSql('UPDATE event SET visitor_start = date_time_start_visitor');
        $this->addSql('UPDATE event SET visitor_price = price_visitor');
        $this->addSql('UPDATE event SET rider_price = price_rider');
        $this->addSql('UPDATE event SET rider_breefing = date_time_riders_breefing');
        $this->addSql('UPDATE event SET rider_start = date_time_arrival');
        $this->addSql('UPDATE event SET rider_end = date_time_departure');

        // alte properties löschen
        $this->addSql('ALTER TABLE event 
            DROP date_time_start_visitor, 
            DROP price_visitor, 
            DROP price_rider, 
            DROP date_time_riders_breefing, 
            DROP classes, 
            DROP date_time_arrival, 
            DROP date_time_departure'
        );
    }

    public function down(Schema $schema): void
    {
        // alte properties wiederherstellen
        $this->addSql('ALTER TABLE event 
            ADD date_time_start_visitor DATETIME DEFAULT NULL, 
            ADD price_visitor DOUBLE PRECISION DEFAULT NULL, 
            ADD price_rider DOUBLE PRECISION DEFAULT NULL, 
            ADD date_time_riders_breefing DATETIME DEFAULT NULL, 
            ADD classes VARCHAR(255) DEFAULT NULL, 
            ADD date_time_arrival DATETIME DEFAULT NULL, 
            ADD date_time_departure DATETIME DEFAULT NULL'
        );

        // remapping
        $this->addSql('UPDATE event SET date_time_start_visitor = visitor_start');
        $this->addSql('UPDATE event SET price_visitor = visitor_price');
        $this->addSql('UPDATE event SET price_rider = rider_price');
        $this->addSql('UPDATE event SET date_time_riders_breefing = rider_breefing');
        $this->addSql('UPDATE event SET date_time_arrival = rider_start');
        $this->addSql('UPDATE event SET date_time_departure = rider_end');

        // neue properties löschen
        $this->addSql('ALTER TABLE event 
            DROP is_all_day, 
            DROP schedule, 
            DROP visitor_price, 
            DROP visitor_start, 
            DROP rider_classes, 
            DROP rider_price, 
            DROP rider_start, 
            DROP rider_breefing, 
            DROP rider_end, 
            DROP organizers, 
            DROP websites, 
            DROP visibility, 
            DROP status, 
            DROP rider_registration'
        );
    }
}
