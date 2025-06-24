<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624110152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'association-mapping of user&complaint entities';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD user_id INT UNSIGNED DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3AA76ED395 ON complaints (user_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3AA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3AA76ED395 ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP user_id
        SQL);
    }
}
