<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108131533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE controle (id INT AUTO_INCREMENT NOT NULL, le_salarie_id INT DEFAULT NULL, la_location_id INT DEFAULT NULL, date_controle DATETIME NOT NULL, INDEX IDX_E39396E7B59ECE1 (le_salarie_id), INDEX IDX_E39396E87D33107 (la_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dommage (id INT AUTO_INCREMENT NOT NULL, la_gravite_id INT DEFAULT NULL, l_element_id INT DEFAULT NULL, le_controle_id INT DEFAULT NULL, INDEX IDX_EDA85F85B4A9E42 (la_gravite_id), INDEX IDX_EDA85F85415E8C56 (l_element_id), INDEX IDX_EDA85F8534AE5CB9 (le_controle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gravite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, le_vehicule_id INT DEFAULT NULL, date_location DATETIME NOT NULL, INDEX IDX_5E9E89CBB6D4F0E (le_vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, le_modele_id INT DEFAULT NULL, immatriculation VARCHAR(255) NOT NULL, INDEX IDX_292FFF1D750CA3FD (le_modele_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE controle ADD CONSTRAINT FK_E39396E7B59ECE1 FOREIGN KEY (le_salarie_id) REFERENCES salarie (id)');
        $this->addSql('ALTER TABLE controle ADD CONSTRAINT FK_E39396E87D33107 FOREIGN KEY (la_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE dommage ADD CONSTRAINT FK_EDA85F85B4A9E42 FOREIGN KEY (la_gravite_id) REFERENCES gravite (id)');
        $this->addSql('ALTER TABLE dommage ADD CONSTRAINT FK_EDA85F85415E8C56 FOREIGN KEY (l_element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE dommage ADD CONSTRAINT FK_EDA85F8534AE5CB9 FOREIGN KEY (le_controle_id) REFERENCES controle (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBB6D4F0E FOREIGN KEY (le_vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D750CA3FD FOREIGN KEY (le_modele_id) REFERENCES modele (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dommage DROP FOREIGN KEY FK_EDA85F8534AE5CB9');
        $this->addSql('ALTER TABLE dommage DROP FOREIGN KEY FK_EDA85F85415E8C56');
        $this->addSql('ALTER TABLE dommage DROP FOREIGN KEY FK_EDA85F85B4A9E42');
        $this->addSql('ALTER TABLE controle DROP FOREIGN KEY FK_E39396E87D33107');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D750CA3FD');
        $this->addSql('ALTER TABLE controle DROP FOREIGN KEY FK_E39396E7B59ECE1');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBB6D4F0E');
        $this->addSql('DROP TABLE controle');
        $this->addSql('DROP TABLE dommage');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE gravite');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE salarie');
        $this->addSql('DROP TABLE vehicule');
    }
}
