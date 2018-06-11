<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180611185355 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film ADD affiche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2248A60577 FOREIGN KEY (affiche_id) REFERENCES affiche (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8244BE2248A60577 ON film (affiche_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2248A60577');
        $this->addSql('DROP INDEX UNIQ_8244BE2248A60577 ON film');
        $this->addSql('ALTER TABLE film DROP affiche_id');
    }
}
