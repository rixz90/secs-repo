<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250709150742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3ADCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3ADCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id) ON DELETE SET NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints DROP FOREIGN KEY FK_A05AAF3ADCD6CC49
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE complaints ADD CONSTRAINT FK_A05AAF3ADCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
    }
}
