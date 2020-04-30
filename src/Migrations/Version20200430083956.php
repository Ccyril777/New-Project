<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430083956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE confidentialite ADD system_information_id INT NOT NULL');
        $this->addSql('ALTER TABLE confidentialite ADD CONSTRAINT FK_9E501717AEEBF485 FOREIGN KEY (system_information_id) REFERENCES system_information (id)');
        $this->addSql('CREATE INDEX IDX_9E501717AEEBF485 ON confidentialite (system_information_id)');
        $this->addSql('ALTER TABLE system_information CHANGE description description VARCHAR(1500) DEFAULT NULL');
        $this->addSql('ALTER TABLE technologie_mi CHANGE description description VARCHAR(1500) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE confidentialite DROP FOREIGN KEY FK_9E501717AEEBF485');
        $this->addSql('DROP INDEX IDX_9E501717AEEBF485 ON confidentialite');
        $this->addSql('ALTER TABLE confidentialite DROP system_information_id');
        $this->addSql('ALTER TABLE system_information CHANGE description description VARCHAR(1500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE technologie_mi CHANGE description description VARCHAR(1500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
