<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926074109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseil_habitude (conseil_id INT NOT NULL, habitude_id INT NOT NULL, INDEX IDX_225B0677668A3E03 (conseil_id), INDEX IDX_225B0677B80619B9 (habitude_id), PRIMARY KEY(conseil_id, habitude_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseil_habitude ADD CONSTRAINT FK_225B0677668A3E03 FOREIGN KEY (conseil_id) REFERENCES conseil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseil_habitude ADD CONSTRAINT FK_225B0677B80619B9 FOREIGN KEY (habitude_id) REFERENCES habitude (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitude ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitude ADD CONSTRAINT FK_10DD3E5FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_10DD3E5FA76ED395 ON habitude (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseil_habitude DROP FOREIGN KEY FK_225B0677668A3E03');
        $this->addSql('ALTER TABLE conseil_habitude DROP FOREIGN KEY FK_225B0677B80619B9');
        $this->addSql('DROP TABLE conseil_habitude');
        $this->addSql('ALTER TABLE habitude DROP FOREIGN KEY FK_10DD3E5FA76ED395');
        $this->addSql('DROP INDEX IDX_10DD3E5FA76ED395 ON habitude');
        $this->addSql('ALTER TABLE habitude DROP user_id');
    }
}
