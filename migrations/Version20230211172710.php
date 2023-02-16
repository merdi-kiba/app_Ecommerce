<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211172710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE watch ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE watch ADD CONSTRAINT FK_500B4A26A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_500B4A26A76ED395 ON watch (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE watch DROP FOREIGN KEY FK_500B4A26A76ED395');
        $this->addSql('DROP INDEX IDX_500B4A26A76ED395 ON watch');
        $this->addSql('ALTER TABLE watch DROP user_id');
    }
}
