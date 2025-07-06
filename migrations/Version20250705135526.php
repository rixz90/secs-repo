<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250705135526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints CHANGE status status INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              users
            ADD
              employee_id VARCHAR(255) DEFAULT NULL,
            ADD
              student_id VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E98C03F15C ON users (employee_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E9CB944F1A ON users (student_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E98C03F15C ON users
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E9CB944F1A ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP employee_id, DROP student_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints CHANGE status status VARCHAR(255) NOT NULL
        SQL);
    }
}
