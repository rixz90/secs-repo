<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711110128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE complaints_branches (
              complaint_id INT UNSIGNED NOT NULL,
              branch_id INT UNSIGNED NOT NULL,
              INDEX IDX_AF6B8C74EDAE188E (complaint_id),
              INDEX IDX_AF6B8C74DCD6CC49 (branch_id),
              PRIMARY KEY(complaint_id, branch_id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_branches
            ADD
              CONSTRAINT FK_AF6B8C74EDAE188E FOREIGN KEY (complaint_id) REFERENCES complaints (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_branches
            ADD
              CONSTRAINT FK_AF6B8C74DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3ADCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3ADCD6CC49 ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP branch_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_branches DROP FOREIGN KEY FK_AF6B8C74EDAE188E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_branches DROP FOREIGN KEY FK_AF6B8C74DCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE complaints_branches
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD branch_id INT UNSIGNED DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              CONSTRAINT FK_A05AAF3ADCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id) ON
            UPDATE
              NO ACTION ON DELETE
            SET
              NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3ADCD6CC49 ON complaints (branch_id)
        SQL);
    }
}
