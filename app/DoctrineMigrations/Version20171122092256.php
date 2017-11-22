<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122092256 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3D7FC41EF');
        $this->addSql('DROP INDEX UNIQ_520D81B3D7FC41EF ON accomodation');
        $this->addSql('ALTER TABLE accomodation CHANGE availabilities availability INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B33FB7A2BF FOREIGN KEY (availability) REFERENCES availability (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_520D81B33FB7A2BF ON accomodation (availability)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B33FB7A2BF');
        $this->addSql('DROP INDEX UNIQ_520D81B33FB7A2BF ON accomodation');
        $this->addSql('ALTER TABLE accomodation CHANGE availability availabilities INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3D7FC41EF FOREIGN KEY (availabilities) REFERENCES availability (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_520D81B3D7FC41EF ON accomodation (availabilities)');
    }
}
