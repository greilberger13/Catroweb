<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171102143228 extends AbstractMigration
{
  /**
   * @throws \Doctrine\DBAL\Exception
   */
  public function up(Schema $schema): void
  {
    // this up() migration is auto-generated, please modify it to your needs
    $this->abortIf('mysql' != $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('ALTER TABLE CatroNotification DROP FOREIGN KEY FK_22087FCAF675F31B');
    $this->addSql('DROP INDEX IDX_22087FCAF675F31B ON CatroNotification');
    $this->addSql('ALTER TABLE CatroNotification CHANGE author_id comment_id INT DEFAULT NULL');
    $this->addSql('ALTER TABLE CatroNotification ADD CONSTRAINT FK_22087FCAF8697D13 FOREIGN KEY (comment_id) REFERENCES user_comment (id)');
    $this->addSql('CREATE INDEX IDX_22087FCAF8697D13 ON CatroNotification (comment_id)');
  }

  /**
   * @throws \Doctrine\DBAL\Exception
   */
  public function down(Schema $schema): void
  {
    // this down() migration is auto-generated, please modify it to your needs
    $this->abortIf('mysql' != $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('ALTER TABLE CatroNotification DROP FOREIGN KEY FK_22087FCAF8697D13');
    $this->addSql('DROP INDEX IDX_22087FCAF8697D13 ON CatroNotification');
    $this->addSql('ALTER TABLE CatroNotification CHANGE comment_id author_id INT DEFAULT NULL');
    $this->addSql('ALTER TABLE CatroNotification ADD CONSTRAINT FK_22087FCAF675F31B FOREIGN KEY (author_id) REFERENCES fos_user (id)');
    $this->addSql('CREATE INDEX IDX_22087FCAF675F31B ON CatroNotification (author_id)');
  }
}
