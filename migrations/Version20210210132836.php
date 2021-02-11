<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210132836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, pseudonyme VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_model3_d (category_id INT NOT NULL, model3_d_id INT NOT NULL, INDEX IDX_6DE90AD12469DE2 (category_id), INDEX IDX_6DE90AD10503CA7 (model3_d_id), PRIMARY KEY(category_id, model3_d_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, comment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_model3_d (id INT AUTO_INCREMENT NOT NULL, array_model LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model3_d (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, file_model_id INT NOT NULL, model VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_B1A414D667B3B43D (users_id), INDEX IDX_B1A414D6C825387A (file_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, comment_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D6494B09E92C (administrator_id), INDEX IDX_8D93D649F8697D13 (comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_model3_d ADD CONSTRAINT FK_6DE90AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_model3_d ADD CONSTRAINT FK_6DE90AD10503CA7 FOREIGN KEY (model3_d_id) REFERENCES model3_d (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model3_d ADD CONSTRAINT FK_B1A414D667B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE model3_d ADD CONSTRAINT FK_B1A414D6C825387A FOREIGN KEY (file_model_id) REFERENCES file_model3_d (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6494B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6494B09E92C');
        $this->addSql('ALTER TABLE category_model3_d DROP FOREIGN KEY FK_6DE90AD12469DE2');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649F8697D13');
        $this->addSql('ALTER TABLE model3_d DROP FOREIGN KEY FK_B1A414D6C825387A');
        $this->addSql('ALTER TABLE category_model3_d DROP FOREIGN KEY FK_6DE90AD10503CA7');
        $this->addSql('ALTER TABLE model3_d DROP FOREIGN KEY FK_B1A414D667B3B43D');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_model3_d');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE file_model3_d');
        $this->addSql('DROP TABLE model3_d');
        $this->addSql('DROP TABLE `user`');
    }
}
