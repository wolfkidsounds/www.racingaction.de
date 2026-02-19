<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260219170350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_racing_class (event_id INT NOT NULL, racing_class_id INT NOT NULL, INDEX IDX_583C86C171F7E88B (event_id), INDEX IDX_583C86C17D491E65 (racing_class_id), PRIMARY KEY(event_id, racing_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_link (event_id INT NOT NULL, link_id INT NOT NULL, INDEX IDX_2967D55A71F7E88B (event_id), INDEX IDX_2967D55AADA40271 (link_id), PRIMARY KEY(event_id, link_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, icon_class VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racing_class (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_racing_class ADD CONSTRAINT FK_583C86C171F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_racing_class ADD CONSTRAINT FK_583C86C17D491E65 FOREIGN KEY (racing_class_id) REFERENCES racing_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_link ADD CONSTRAINT FK_2967D55A71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_link ADD CONSTRAINT FK_2967D55AADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD subtitle VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_racing_class DROP FOREIGN KEY FK_583C86C171F7E88B');
        $this->addSql('ALTER TABLE event_racing_class DROP FOREIGN KEY FK_583C86C17D491E65');
        $this->addSql('ALTER TABLE event_link DROP FOREIGN KEY FK_2967D55A71F7E88B');
        $this->addSql('ALTER TABLE event_link DROP FOREIGN KEY FK_2967D55AADA40271');
        $this->addSql('DROP TABLE event_racing_class');
        $this->addSql('DROP TABLE event_link');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE racing_class');
        $this->addSql('ALTER TABLE event DROP subtitle');
    }
}
