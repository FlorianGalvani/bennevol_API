<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209210712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784A177FE1');
        $this->addSql('DROP INDEX IDX_C42F7784A177FE1 ON report');
        $this->addSql('ALTER TABLE report CHANGE dumpsters_id dumpster_id INT NOT NULL');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784DE41E480 FOREIGN KEY (dumpster_id) REFERENCES dumpsters (id)');
        $this->addSql('CREATE INDEX IDX_C42F7784DE41E480 ON report (dumpster_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784DE41E480');
        $this->addSql('DROP INDEX IDX_C42F7784DE41E480 ON report');
        $this->addSql('ALTER TABLE report CHANGE dumpster_id dumpsters_id INT NOT NULL');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784A177FE1 FOREIGN KEY (dumpsters_id) REFERENCES dumpsters (id)');
        $this->addSql('CREATE INDEX IDX_C42F7784A177FE1 ON report (dumpsters_id)');
    }
}
