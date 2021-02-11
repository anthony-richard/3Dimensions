<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211084844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B09E92C');
        $this->addSql('ALTER TABLE model3_d DROP FOREIGN KEY FK_B1A414D6C825387A');
        $this->addSql('ALTER TABLE category_model3_d DROP FOREIGN KEY FK_6DE90AD10503CA7');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, category_id INT NOT NULL, file LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_D79572D967B3B43D (users_id), INDEX IDX_D79572D912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D967B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE category_model3_d');
        $this->addSql('DROP TABLE file_model3_d');
        $this->addSql('DROP TABLE model3_d');
        $this->addSql('ALTER TABLE category ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment ADD users_id INT NOT NULL, ADD model_id INT NOT NULL, CHANGE comment text VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_9474526C67B3B43D ON comment (users_id)');
        $this->addSql('CREATE INDEX IDX_9474526C7975B7E7 ON comment (model_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F8697D13');
        $this->addSql('DROP INDEX IDX_8D93D649F8697D13 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6494B09E92C ON user');
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD role TINYINT(1) NOT NULL, DROP administrator_id, DROP comment_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7975B7E7');
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pseudonyme VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category_model3_d (category_id INT NOT NULL, model3_d_id INT NOT NULL, INDEX IDX_6DE90AD12469DE2 (category_id), INDEX IDX_6DE90AD10503CA7 (model3_d_id), PRIMARY KEY(category_id, model3_d_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE file_model3_d (id INT AUTO_INCREMENT NOT NULL, array_model LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE model3_d (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, file_model_id INT NOT NULL, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B1A414D6C825387A (file_model_id), INDEX IDX_B1A414D667B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_model3_d ADD CONSTRAINT FK_6DE90AD10503CA7 FOREIGN KEY (model3_d_id) REFERENCES model3_d (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_model3_d ADD CONSTRAINT FK_6DE90AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model3_d ADD CONSTRAINT FK_B1A414D667B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE model3_d ADD CONSTRAINT FK_B1A414D6C825387A FOREIGN KEY (file_model_id) REFERENCES file_model3_d (id)');
        $this->addSql('DROP TABLE model');
        $this->addSql('ALTER TABLE category DROP type');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C67B3B43D');
        $this->addSql('DROP INDEX IDX_9474526C67B3B43D ON comment');
        $this->addSql('DROP INDEX IDX_9474526C7975B7E7 ON comment');
        $this->addSql('ALTER TABLE comment DROP users_id, DROP model_id, CHANGE text comment VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD administrator_id INT DEFAULT NULL, ADD comment_id INT DEFAULT NULL, DROP lastname, DROP firstname, DROP email, DROP password, DROP role');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F8697D13 ON user (comment_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494B09E92C ON user (administrator_id)');
    }
}
