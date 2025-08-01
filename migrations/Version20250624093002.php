<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624093002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create complaints table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE complaints (
              id INT UNSIGNED AUTO_INCREMENT NOT NULL,
              title VARCHAR(255) NOT NULL,
              description VARCHAR(255) NOT NULL,
              image VARCHAR(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
              updated_at DATETIME DEFAULT NULL,
              deleted_at DATETIME DEFAULT NULL,
              completed_at DATETIME DEFAULT NULL,
              status VARCHAR(255) NOT NULL,
              PRIMARY KEY(id)
            )
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE complaints
        SQL);
    }
}
