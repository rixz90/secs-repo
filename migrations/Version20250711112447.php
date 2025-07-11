<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711112447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE complaints_categories (
              complaint_id INT UNSIGNED NOT NULL,
              category_id INT UNSIGNED NOT NULL,
              INDEX IDX_861FD8B0EDAE188E (complaint_id),
              INDEX IDX_861FD8B012469DE2 (category_id),
              PRIMARY KEY(complaint_id, category_id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_categories
            ADD
              CONSTRAINT FK_861FD8B0EDAE188E FOREIGN KEY (complaint_id) REFERENCES complaints (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_categories
            ADD
              CONSTRAINT FK_861FD8B012469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3A12469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3A12469DE2 ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP category_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_categories DROP FOREIGN KEY FK_861FD8B0EDAE188E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_categories DROP FOREIGN KEY FK_861FD8B012469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE complaints_categories
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD category_id INT UNSIGNED DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              CONSTRAINT FK_A05AAF3A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) ON
            UPDATE
              NO ACTION ON DELETE
            SET
              NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3A12469DE2 ON complaints (category_id)
        SQL);
    }
}
