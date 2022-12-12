<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212090011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favourite DROP FOREIGN KEY FK_62A2CA197126B8AE');
        $this->addSql('ALTER TABLE favourite DROP FOREIGN KEY FK_62A2CA197CCEF365');
        $this->addSql('DROP TABLE favourite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favourite (id INT AUTO_INCREMENT NOT NULL, annonce_fav_id INT DEFAULT NULL, usersfav_id INT DEFAULT NULL, INDEX IDX_62A2CA197CCEF365 (annonce_fav_id), INDEX IDX_62A2CA197126B8AE (usersfav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE favourite ADD CONSTRAINT FK_62A2CA197126B8AE FOREIGN KEY (usersfav_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE favourite ADD CONSTRAINT FK_62A2CA197CCEF365 FOREIGN KEY (annonce_fav_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
