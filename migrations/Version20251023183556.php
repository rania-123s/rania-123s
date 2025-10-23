<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251023183556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambre_rania_selmi (id INT AUTO_INCREMENT NOT NULL, hospital_rania_selmi_id INT DEFAULT NULL, numch_rania_selmi INT NOT NULL, patient_rania_selmi VARCHAR(255) NOT NULL, INDEX IDX_9E87344A2BE976A4 (hospital_rania_selmi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hospital_rania_selmi (id INT AUTO_INCREMENT NOT NULL, nom_rania_selmi VARCHAR(255) NOT NULL, nbrch_rania_selmi INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre_rania_selmi ADD CONSTRAINT FK_9E87344A2BE976A4 FOREIGN KEY (hospital_rania_selmi_id) REFERENCES hospital_rania_selmi (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre_rania_selmi DROP FOREIGN KEY FK_9E87344A2BE976A4');
        $this->addSql('DROP TABLE chambre_rania_selmi');
        $this->addSql('DROP TABLE hospital_rania_selmi');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
