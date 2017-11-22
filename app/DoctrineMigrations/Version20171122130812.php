<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122130812 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDE520D81B3, ADD INDEX IDX_E00CEDDE520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDE92E7B427, ADD INDEX IDX_E00CEDDE92E7B427 (traveller)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDE520D81B3, ADD UNIQUE INDEX UNIQ_E00CEDDE520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDE92E7B427, ADD UNIQUE INDEX UNIQ_E00CEDDE92E7B427 (traveller)');
    }
}
