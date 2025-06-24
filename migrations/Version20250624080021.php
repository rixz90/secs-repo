<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624080021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'First';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE branches (
              id INT UNSIGNED AUTO_INCREMENT NOT NULL,
              code VARCHAR(255) NOT NULL,
              UNIQUE INDEX UNIQ_D760D16F77153098 (code),
              PRIMARY KEY(id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE categories (
              id INT UNSIGNED AUTO_INCREMENT NOT NULL,
              name VARCHAR(255) NOT NULL,
              PRIMARY KEY(id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE locations (
              id INT UNSIGNED AUTO_INCREMENT NOT NULL,
              name VARCHAR(255) NOT NULL,
              PRIMARY KEY(id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users (
              id INT UNSIGNED AUTO_INCREMENT NOT NULL,
              name VARCHAR(255) NOT NULL,
              email VARCHAR(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
              updated_at DATETIME DEFAULT NULL,
              deleted_at DATETIME DEFAULT NULL,
              is_admin TINYINT(1) DEFAULT 0 NOT NULL,
              PRIMARY KEY(id)
            )
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE branches
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categories
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE locations
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users
        SQL);
    }
}
