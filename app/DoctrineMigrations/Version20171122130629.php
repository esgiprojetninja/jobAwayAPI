<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122130629 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP INDEX UNIQ_B6BD307F520D81B3, ADD INDEX IDX_B6BD307F520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE message DROP INDEX UNIQ_B6BD307FC8B28E44, ADD INDEX IDX_B6BD307FC8B28E44 (candidate)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP INDEX IDX_B6BD307F520D81B3, ADD UNIQUE INDEX UNIQ_B6BD307F520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE message DROP INDEX IDX_B6BD307FC8B28E44, ADD UNIQUE INDEX UNIQ_B6BD307FC8B28E44 (candidate)');
    }
}
