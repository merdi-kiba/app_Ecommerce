<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217111254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64959B42CF6');
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885A76ED395');
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885C7C58135');
        $this->addSql('DROP TABLE payement');
        $this->addSql('DROP TABLE info_payement');
        $this->addSql('DROP INDEX IDX_8D93D64959B42CF6 ON user');
        $this->addSql('ALTER TABLE user DROP info_payement_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payement (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, watch_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, curent VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', payementstatut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, payement_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, payeur_td VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email_payeur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B20A7885A76ED395 (user_id), INDEX IDX_B20A7885C7C58135 (watch_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE info_payement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885C7C58135 FOREIGN KEY (watch_id) REFERENCES watch (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD info_payement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64959B42CF6 FOREIGN KEY (info_payement_id) REFERENCES info_payement (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64959B42CF6 ON user (info_payement_id)');
    }
}
