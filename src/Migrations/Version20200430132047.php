<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430132047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE typology_mi (id INT AUTO_INCREMENT NOT NULL, system_information_id INT NOT NULL, short_name VARCHAR(255) NOT NULL, long_name VARCHAR(255) NOT NULL, description VARCHAR(1500) DEFAULT NULL, INDEX IDX_DD0435C3AEEBF485 (system_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE confidentialite (id INT AUTO_INCREMENT NOT NULL, system_information_id INT NOT NULL, confidentialite_name VARCHAR(255) NOT NULL, INDEX IDX_9E501717AEEBF485 (system_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE system_information (id INT AUTO_INCREMENT NOT NULL, usual_information_name VARCHAR(255) NOT NULL, sii_name VARCHAR(255) NOT NULL, description VARCHAR(1500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, system_information_id INT NOT NULL, domaine_name VARCHAR(255) NOT NULL, INDEX IDX_78AF0ACCAEEBF485 (system_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color_si (id INT AUTO_INCREMENT NOT NULL, color_name VARCHAR(255) NOT NULL, color_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE typology_mi ADD CONSTRAINT FK_DD0435C3AEEBF485 FOREIGN KEY (system_information_id) REFERENCES system_information (id)');
        $this->addSql('ALTER TABLE confidentialite ADD CONSTRAINT FK_9E501717AEEBF485 FOREIGN KEY (system_information_id) REFERENCES system_information (id)');
        $this->addSql('ALTER TABLE domaine ADD CONSTRAINT FK_78AF0ACCAEEBF485 FOREIGN KEY (system_information_id) REFERENCES system_information (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE typology_mi DROP FOREIGN KEY FK_DD0435C3AEEBF485');
        $this->addSql('ALTER TABLE confidentialite DROP FOREIGN KEY FK_9E501717AEEBF485');
        $this->addSql('ALTER TABLE domaine DROP FOREIGN KEY FK_78AF0ACCAEEBF485');
        $this->addSql('DROP TABLE typology_mi');
        $this->addSql('DROP TABLE confidentialite');
        $this->addSql('DROP TABLE system_information');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE color_si');
    }
}
