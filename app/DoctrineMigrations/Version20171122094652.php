<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122094652 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B33FB7A2BF');
        $this->addSql('DROP INDEX UNIQ_520D81B33FB7A2BF ON accomodation');
        $this->addSql('ALTER TABLE accomodation CHANGE availability availabilities INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3D7FC41EF FOREIGN KEY (availabilities) REFERENCES availability (id)');
        $this->addSql('CREATE INDEX IDX_520D81B3D7FC41EF ON accomodation (availabilities)');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF520D81B3');
        $this->addSql('DROP INDEX UNIQ_3FB7A2BF520D81B3 ON availability');
        $this->addSql('ALTER TABLE availability DROP accomodation');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F91BD8781');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FFD70509C');
        $this->addSql('DROP INDEX UNIQ_B6BD307F91BD8781 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FFD70509C ON message');
        $this->addSql('ALTER TABLE message ADD accomodation INT DEFAULT NULL, ADD candidate INT DEFAULT NULL, DROP candidate_id, DROP accomodation_id');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC8B28E44 FOREIGN KEY (candidate) REFERENCES candidate (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307F520D81B3 ON message (accomodation)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307FC8B28E44 ON message (candidate)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3D7FC41EF');
        $this->addSql('DROP INDEX IDX_520D81B3D7FC41EF ON accomodation');
        $this->addSql('ALTER TABLE accomodation CHANGE availabilities availability INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B33FB7A2BF FOREIGN KEY (availability) REFERENCES availability (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_520D81B33FB7A2BF ON accomodation (availability)');
        $this->addSql('ALTER TABLE availability ADD accomodation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF520D81B3 FOREIGN KEY (accomodation) REFERENCES accomodation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3FB7A2BF520D81B3 ON availability (accomodation)');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F520D81B3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC8B28E44');
        $this->addSql('DROP INDEX UNIQ_B6BD307F520D81B3 ON message');
        $this->addSql('DROP INDEX UNIQ_B6BD307FC8B28E44 ON message');
        $this->addSql('ALTER TABLE message ADD candidate_id INT DEFAULT NULL, ADD accomodation_id INT DEFAULT NULL, DROP accomodation, DROP candidate');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FFD70509C FOREIGN KEY (accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307F91BD8781 ON message (candidate_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FFD70509C ON message (accomodation_id)');
    }
}
