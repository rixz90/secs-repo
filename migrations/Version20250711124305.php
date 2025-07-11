<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711124305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE complaints_locations (
              complaint_id INT UNSIGNED NOT NULL,
              location_id INT UNSIGNED NOT NULL,
              INDEX IDX_9DFB880BEDAE188E (complaint_id),
              INDEX IDX_9DFB880B64D218E (location_id),
              PRIMARY KEY(complaint_id, location_id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_locations
            ADD
              CONSTRAINT FK_9DFB880BEDAE188E FOREIGN KEY (complaint_id) REFERENCES complaints (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints_locations
            ADD
              CONSTRAINT FK_9DFB880B64D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3A64D218E
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3A64D218E ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP location_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_locations DROP FOREIGN KEY FK_9DFB880BEDAE188E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints_locations DROP FOREIGN KEY FK_9DFB880B64D218E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE complaints_locations
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD location_id INT UNSIGNED DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              CONSTRAINT FK_A05AAF3A64D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON
            UPDATE
              NO ACTION ON DELETE
            SET
              NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3A64D218E ON complaints (location_id)
        SQL);
    }
}
