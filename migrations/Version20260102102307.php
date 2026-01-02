<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260102102307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fishing_log (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, weight NUMERIC(5, 2) DEFAULT NULL, length NUMERIC(5, 2) DEFAULT NULL, date DATE NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE fishing_log_photo (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, original_name VARCHAR(255) NOT NULL, fishing_log_id INT DEFAULT NULL, INDEX IDX_FA94F91D7844F0C2 (fishing_log_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE fishing_log_photo ADD CONSTRAINT FK_FA94F91D7844F0C2 FOREIGN KEY (fishing_log_id) REFERENCES fishing_log (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fishing_log_photo DROP FOREIGN KEY FK_FA94F91D7844F0C2');
        $this->addSql('DROP TABLE fishing_log');
        $this->addSql('DROP TABLE fishing_log_photo');
    }
}
