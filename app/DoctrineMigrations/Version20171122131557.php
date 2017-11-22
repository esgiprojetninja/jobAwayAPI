<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122131557 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accomodation (id INT AUTO_INCREMENT NOT NULL, pictures INT DEFAULT NULL, availabilities INT DEFAULT NULL, host INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, coutry VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, nb_bedroom INT NOT NULL, nb_bathroom INT NOT NULL, nb_toilet INT NOT NULL, nb_max_baby INT NOT NULL, nb_max_child INT NOT NULL, nb_max_guest INT NOT NULL, nb_max_adult INT NOT NULL, animals_allowed TINYINT(1) NOT NULL, smokers_allowed TINYINT(1) NOT NULL, has_internet TINYINT(1) NOT NULL, property_size DOUBLE PRECISION NOT NULL, floor INT NOT NULL, min_stay INT NOT NULL, max_stay INT NOT NULL, type VARCHAR(255) NOT NULL, checkin_hour DATETIME NOT NULL, checkout_hour DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_520D81B38F7C2FC0 (pictures), INDEX IDX_520D81B3D7FC41EF (availabilities), INDEX IDX_520D81B3CF2713FD (host), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, from_date DATETIME NOT NULL, to_date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, accomodation INT DEFAULT NULL, traveller INT DEFAULT NULL, checkin_date DATETIME NOT NULL, checkout_date DATETIME NOT NULL, checkin_hour VARCHAR(255) NOT NULL, checkout_hour VARCHAR(255) NOT NULL, checkin_details VARCHAR(255) NOT NULL, checkout_details VARCHAR(255) NOT NULL, nb_nights INT NOT NULL, nb_persons INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E00CEDDE520D81B3 (accomodation), INDEX IDX_E00CEDDE92E7B427 (traveller), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, accomodation INT DEFAULT NULL, from_date DATETIME NOT NULL, to_date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C8B28E448D93D649 (user), INDEX IDX_C8B28E44520D81B3 (accomodation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, accomodation INT DEFAULT NULL, candidate INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B6BD307F520D81B3 (accomodation), INDEX IDX_B6BD307FC8B28E44 (candidate), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, languages LONGTEXT NOT NULL, skills LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B38F7C2FC0 FOREIGN KEY (pictures) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3D7FC41EF FOREIGN KEY (availabilities) REFERENCES availability (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3CF2713FD FOREIGN KEY (host) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE92E7B427 FOREIGN KEY (traveller) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC8B28E44 FOREIGN KEY (candidate) REFERENCES candidate (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE520D81B3');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44520D81B3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F520D81B3');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3D7FC41EF');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC8B28E44');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B38F7C2FC0');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3CF2713FD');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE92E7B427');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E448D93D649');
        $this->addSql('DROP TABLE accomodation');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE user');
    }
}
