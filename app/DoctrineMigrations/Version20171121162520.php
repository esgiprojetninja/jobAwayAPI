<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171121162520 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accomodation (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, coutry VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, `long` DOUBLE PRECISION NOT NULL, lat DOUBLE PRECISION NOT NULL, nb_bedroom INT NOT NULL, nb_bathroom INT NOT NULL, nb_toilet INT NOT NULL, nb_max_baby INT NOT NULL, nb_max_child INT NOT NULL, nb_max_guest INT NOT NULL, nb_max_adult INT NOT NULL, animals_allowed TINYINT(1) NOT NULL, smokers_allowed TINYINT(1) NOT NULL, has_internet TINYINT(1) NOT NULL, property_size DOUBLE PRECISION NOT NULL, floor INT NOT NULL, min_stay INT NOT NULL, max_stay INT NOT NULL, type VARCHAR(255) NOT NULL, checkin_hour DATETIME NOT NULL, checkout_hour DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE accomodation');
    }
}
