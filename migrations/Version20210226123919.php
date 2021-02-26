<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226123919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, dni VARCHAR(9) NOT NULL, pasaport VARCHAR(9) NOT NULL, num_tarj SMALLINT NOT NULL, INDEX IDX_81398E09A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, trip_id INT DEFAULT NULL, cod VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(500) DEFAULT NULL, staying_place LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', price DOUBLE PRECISION NOT NULL, INDEX IDX_3EC63EAAA5BC2E0E (trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landmark (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, cod VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(500) DEFAULT NULL, description VARCHAR(500) NOT NULL, INDEX IDX_D6DBBF06816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, cif VARCHAR(9) NOT NULL, address VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, INDEX IDX_29D6873EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, transport_way LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', staying_days SMALLINT DEFAULT NULL, origin LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, mail VARCHAR(255) DEFAULT NULL, telephone VARCHAR(9) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE landmark ADD CONSTRAINT FK_D6DBBF06816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE landmark DROP FOREIGN KEY FK_D6DBBF06816C6140');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAA5BC2E0E');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09A76ED395');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA76ED395');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE landmark');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE user');
    }
}
