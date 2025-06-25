<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624114027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create many-to-many for location & branche';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE locations_branches (
              location_id INT UNSIGNED NOT NULL,
              branch_id INT UNSIGNED NOT NULL,
              INDEX IDX_E214A12764D218E (location_id),
              INDEX IDX_E214A127DCD6CC49 (branch_id),
              PRIMARY KEY(location_id, branch_id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              locations_branches
            ADD
              CONSTRAINT FK_E214A12764D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              locations_branches
            ADD
              CONSTRAINT FK_E214A127DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE locations_branches DROP FOREIGN KEY FK_E214A12764D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE locations_branches DROP FOREIGN KEY FK_E214A127DCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE locations_branches
        SQL);
    }
}
