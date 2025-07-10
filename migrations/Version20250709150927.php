<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250709150927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3A64D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3AA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3A64D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3AA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3A64D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3A64D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
    }
}
