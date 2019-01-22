<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190122131633 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post_sharing ADD post_id INT NOT NULL');
        $this->addSql('ALTER TABLE post_sharing ADD CONSTRAINT FK_93695B5B4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_93695B5B4B89032C ON post_sharing (post_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post_sharing DROP FOREIGN KEY FK_93695B5B4B89032C');
        $this->addSql('DROP INDEX IDX_93695B5B4B89032C ON post_sharing');
        $this->addSql('ALTER TABLE post_sharing DROP post_id');
    }
}
