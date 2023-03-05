<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305100516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, staff_id INT NOT NULL, discount DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_7A2119E39395C3F3 (customer_id), INDEX IDX_7A2119E3D4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill_product (bill_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_278930B21A8C12F5 (bill_id), INDEX IDX_278930B24584665A (product_id), PRIMARY KEY(bill_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birthday DATE NOT NULL, phone_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, seri BIGINT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birthday DATE NOT NULL, phone_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E39395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE bill_product ADD CONSTRAINT FK_278930B21A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bill_product ADD CONSTRAINT FK_278930B24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E39395C3F3');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3D4D57CD');
        $this->addSql('ALTER TABLE bill_product DROP FOREIGN KEY FK_278930B21A8C12F5');
        $this->addSql('ALTER TABLE bill_product DROP FOREIGN KEY FK_278930B24584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE bill_product');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
