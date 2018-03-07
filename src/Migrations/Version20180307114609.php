<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180307114609 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE worker ADD job_id INT DEFAULT NULL, DROP job_title');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF62BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_9FB2BF62BE04EA9 ON worker (job_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE worker DROP FOREIGN KEY FK_9FB2BF62BE04EA9');
        $this->addSql('DROP INDEX IDX_9FB2BF62BE04EA9 ON worker');
        $this->addSql('ALTER TABLE worker ADD job_title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP job_id');
    }
}
