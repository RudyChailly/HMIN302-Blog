<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201208100514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE report_comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE report_comment (id INT NOT NULL, author_id INT NOT NULL, target_id INT NOT NULL, category VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F4ED2F6CF675F31B ON report_comment (author_id)');
        $this->addSql('CREATE INDEX IDX_F4ED2F6C158E0B66 ON report_comment (target_id)');
        $this->addSql('ALTER TABLE report_comment ADD CONSTRAINT FK_F4ED2F6CF675F31B FOREIGN KEY (author_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE report_comment ADD CONSTRAINT FK_F4ED2F6C158E0B66 FOREIGN KEY (target_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE report_comment_id_seq CASCADE');
        $this->addSql('DROP TABLE report_comment');
    }
}