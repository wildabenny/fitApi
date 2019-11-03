<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191102202913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
CREATE TABLE partner
    (
   id SERIAL PRIMARY KEY,
   partner_name VARCHAR (50) UNIQUE NOT NULL,
   description VARCHAR (50) NOT NULL,
   nip VARCHAR (10) UNIQUE NOT NULL,
   www VARCHAR (50),
   date_created TIMESTAMP NOT NULL)'

);

    }

    public function down(Schema $schema) : void
    {
        $this->addSql(<<<SQL
DROP TABLE partner;
SQL
);

    }
}
