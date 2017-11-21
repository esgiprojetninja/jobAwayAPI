<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171121172700 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, accomodation INT DEFAULT NULL, `from` DATETIME NOT NULL, `to` DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_3FB7A2BF520D81B3 (accomodation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, accomodation INT DEFAULT NULL, traveller INT DEFAULT NULL, checkin_date DATETIME NOT NULL, checkout_date DATETIME NOT NULL, checkin_hour VARCHAR(255) NOT NULL, checkout_hour VARCHAR(255) NOT NULL, checkin_details VARCHAR(255) NOT NULL, checkout_details VARCHAR(255) NOT NULL, nb_nights INT NOT NULL, nb_persons INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_E00CEDDE520D81B3 (accomodation), UNIQUE INDEX UNIQ_E00CEDDE92E7B427 (traveller), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, accomodation INT DEFAULT NULL, `from` DATETIME NOT NULL, `to` DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_C8B28E448D93D649 (user), UNIQUE INDEX UNIQ_C8B28E44520D81B3 (accomodation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, accomodation_id INT DEFAULT NULL, candidate_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B6BD307FFD70509C (accomodation_id), UNIQUE INDEX UNIQ_B6BD307F91BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE92E7B427 FOREIGN KEY (traveller) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FFD70509C FOREIGN KEY (accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE accomodation ADD pictures INT DEFAULT NULL, ADD availabilities INT DEFAULT NULL, ADD host INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B38F7C2FC0 FOREIGN KEY (pictures) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3D7FC41EF FOREIGN KEY (availabilities) REFERENCES availability (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3CF2713FD FOREIGN KEY (host) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_520D81B38F7C2FC0 ON accomodation (pictures)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_520D81B3D7FC41EF ON accomodation (availabilities)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_520D81B3CF2713FD ON accomodation (host)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3D7FC41EF');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F91BD8781');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B38F7C2FC0');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE picture');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3CF2713FD');
        $this->addSql('DROP INDEX IDX_520D81B38F7C2FC0 ON accomodation');
        $this->addSql('DROP INDEX UNIQ_520D81B3D7FC41EF ON accomodation');
        $this->addSql('DROP INDEX UNIQ_520D81B3CF2713FD ON accomodation');
        $this->addSql('ALTER TABLE accomodation DROP pictures, DROP availabilities, DROP host');
    }
}
