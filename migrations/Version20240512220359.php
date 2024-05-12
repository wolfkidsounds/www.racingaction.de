<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512220359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_NICKNAME ON user');
        $this->addSql('ALTER TABLE user ADD nationality VARCHAR(255) DEFAULT NULL, ADD user_type VARCHAR(255) NOT NULL, ADD link_url VARCHAR(255) DEFAULT NULL, ADD sport VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON `user`');
        $this->addSql('ALTER TABLE `user` DROP nationality, DROP user_type, DROP link_url, DROP sport');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_NICKNAME ON `user` (nickname)');
    }
}
