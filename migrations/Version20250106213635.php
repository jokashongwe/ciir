<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250106213635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE driver_license_request (id INT AUTO_INCREMENT NOT NULL, requested_by_id INT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', current_score NUMERIC(10, 2) DEFAULT NULL, previous_score NUMERIC(10, 2) DEFAULT NULL, last_exam_date DATETIME DEFAULT NULL, INDEX IDX_B8ADC0EE4DA1E751 (requested_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE passport_request (id INT AUTO_INCREMENT NOT NULL, requested_by_id INT NOT NULL, province_of_origin VARCHAR(255) NOT NULL, mother_name VARCHAR(255) NOT NULL, father_name VARCHAR(255) NOT NULL, grand_father_name VARCHAR(255) NOT NULL, grand_mother_name VARCHAR(255) NOT NULL, passeport_picture VARCHAR(255) DEFAULT NULL, identity_card_photo VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(255) DEFAULT NULL, INDEX IDX_CB40756E4DA1E751 (requested_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, middlename VARCHAR(255) DEFAULT NULL, birthdt DATE DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, gender VARCHAR(5) NOT NULL, profession VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8157AA0FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_exam (id INT AUTO_INCREMENT NOT NULL, questions JSON NOT NULL, good_answers JSON NOT NULL, exam_type VARCHAR(255) DEFAULT NULL, max_score VARCHAR(255) NOT NULL, success_score NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_exam_attempt (id INT AUTO_INCREMENT NOT NULL, passed_by_id INT DEFAULT NULL, request_exam_id INT DEFAULT NULL, questions JSON NOT NULL, answers JSON NOT NULL, result_score NUMERIC(10, 2) NOT NULL, has_succeded TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9586270C6C7A64FA (passed_by_id), INDEX IDX_9586270C7DA92CC6 (request_exam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE driver_license_request ADD CONSTRAINT FK_B8ADC0EE4DA1E751 FOREIGN KEY (requested_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE passport_request ADD CONSTRAINT FK_CB40756E4DA1E751 FOREIGN KEY (requested_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_exam_attempt ADD CONSTRAINT FK_9586270C6C7A64FA FOREIGN KEY (passed_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_exam_attempt ADD CONSTRAINT FK_9586270C7DA92CC6 FOREIGN KEY (request_exam_id) REFERENCES request_exam (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver_license_request DROP FOREIGN KEY FK_B8ADC0EE4DA1E751');
        $this->addSql('ALTER TABLE passport_request DROP FOREIGN KEY FK_CB40756E4DA1E751');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('ALTER TABLE user_exam_attempt DROP FOREIGN KEY FK_9586270C6C7A64FA');
        $this->addSql('ALTER TABLE user_exam_attempt DROP FOREIGN KEY FK_9586270C7DA92CC6');
        $this->addSql('DROP TABLE driver_license_request');
        $this->addSql('DROP TABLE passport_request');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE request_exam');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_exam_attempt');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
