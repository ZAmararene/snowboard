<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514094410 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video CHANGE video_size video_size NUMERIC(10, 0) DEFAULT NULL, CHANGE video_type video_type VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture CHANGE image_size image_size NUMERIC(10, 0) DEFAULT NULL, CHANGE image_type image_type VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture CHANGE image_size image_size NUMERIC(10, 0) NOT NULL, CHANGE image_type image_type VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE video CHANGE video_size video_size NUMERIC(10, 0) NOT NULL, CHANGE video_type video_type VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
