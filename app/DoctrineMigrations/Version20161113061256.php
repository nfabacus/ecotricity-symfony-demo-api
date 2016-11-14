<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161113061256 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE connector (connector_id INT AUTO_INCREMENT NOT NULL, compatible VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, session_duration VARCHAR(255) NOT NULL, PRIMARY KEY(connector_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pump (pump_id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, last_heartbeat VARCHAR(255) NOT NULL, pump_model VARCHAR(255) NOT NULL, connector VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(pump_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (location_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latitude NUMERIC(10, 0) NOT NULL, longitude NUMERIC(10, 0) NOT NULL, postcode VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, pump_id INT NOT NULL, pump_model VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, swipe_only TINYINT(1) NOT NULL, distance NUMERIC(10, 0) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(location_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE connector');
        $this->addSql('DROP TABLE pump');
        $this->addSql('DROP TABLE station');
    }
}
