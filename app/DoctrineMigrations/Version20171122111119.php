<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171122111119 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate DROP INDEX UNIQ_C8B28E44520D81B3, ADD INDEX IDX_C8B28E44520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E448D93D649');
        $this->addSql('DROP INDEX UNIQ_C8B28E448D93D649 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP user');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate DROP INDEX IDX_C8B28E44520D81B3, ADD UNIQUE INDEX UNIQ_C8B28E44520D81B3 (accomodation)');
        $this->addSql('ALTER TABLE candidate ADD user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E448D93D649 ON candidate (user)');
    }
}
