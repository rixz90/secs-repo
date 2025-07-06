<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250705144241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              location_id INT UNSIGNED DEFAULT NULL,
            ADD
              branch_id INT UNSIGNED DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              CONSTRAINT FK_A05AAF3A64D218E FOREIGN KEY (location_id) REFERENCES locations (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              complaints
            ADD
              CONSTRAINT FK_A05AAF3ADCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3A64D218E ON complaints (location_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A05AAF3ADCD6CC49 ON complaints (branch_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3A64D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3ADCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3A64D218E ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A05AAF3ADCD6CC49 ON complaints
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP location_id, DROP branch_id
        SQL);
    }
}
