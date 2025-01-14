<?php

namespace Abruno\Rubrica\repository\database;

use Abruno\Rubrica\repository\RepositoryContract;
use stdClass;
use PDO;
use PDOException;
use RuntimeException;
use Abruno\Rubrica\entity\Contact;

class ContactRepository implements RepositoryContract{

    private string $host;
	private string $user;
	private string $password;
	private string $database;
    private string $tableName = 'contacts';

    public function __construct(){
        $this->host     = "host.docker.internal";
		$this->user     = "root";
		$this->password = "root";
		$this->database = "rubricaphpdb_live";
    }

    private function getConnection(bool $createDb = false): PDO {

		$dsn = $createDb
			? "mysql:host=$this->host;charset=utf8mb4"
			: "mysql:host=$this->host;dbname=$this->database;charset=utf8mb4";

		try {
			return new PDO( $dsn, $this->user, $this->password, [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			] );
		} catch ( PDOException $e ) {
			throw new RuntimeException( "Database connection failed: " . $e->getMessage() );
		}
	}

	public function createContainer(): void {
        $db             = $this->database;
		$tableName      = $this->tableName;
		$createDbSql    = "CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
        $createTableSql = <<<SQL
        USE $db;
        CREATE TABLE IF NOT EXISTS `$tableName` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            surname VARCHAR(100) NOT NULL,
            company VARCHAR(100) NOT NULL,
            additionalInfo TEXT,
            address VARCHAR(255) NOT NULL,
            picture VARCHAR(255) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(15),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;
        SQL;

        $conn = $this->getConnection(true);

        try {
			$conn->exec( $createDbSql );
			$conn->exec( $createTableSql );
		} catch ( PDOException $e ) {
			throw new RuntimeException( "Database creation failed: " . $e->getMessage() );
		}
	}

	public function save( $data ): void {
        $conn = $this->getConnection();

        // UPSERT -- INSERT OR UPDATE
        $sql  = <<<SQL
        INSERT INTO $this->tableName (name, surname, company, additionalInfo, address, picture, email, phone) 
        VALUES (:name, :surname, :company, :additionalInfo, :address, :picture, :email, :phone)
        ON DUPLICATE KEY UPDATE 
            name = VALUES(name),
            surname = VALUES(surname),
            company = VALUES(company),
            additionalInfo = VALUES(additionalInfo),
            address = VALUES(address),
            picture = VALUES(picture),
            email = VALUES(email),
            phone = VALUES(phone);
        SQL;

        $stmt = $conn->prepare( $sql );

        $stmt->bindValue( ':name', $data->name );
		$stmt->bindValue( ':surname', $data->surname );
		$stmt->bindValue( ':company', $data->company );
		$stmt->bindValue( ':additionalInfo', $data->additionalInfo );
		$stmt->bindValue( ':address', $data->address );
		$stmt->bindValue( ':picture', $data->picture );
		$stmt->bindValue( ':email', $data->email );
		$stmt->bindValue( ':phone', $data->phone );

        try {
			$stmt->execute();
		} catch ( PDOException $e ) {
			throw new RuntimeException( "Failed to upsert contact: " . $e->getMessage() );
		}
	}

	public function delete( mixed $id ): void {
		$conn = $this->getConnection();

        $stmt = $conn->prepare( "DELETE FROM $this->tableName WHERE id = :id" );

        $stmt->bindValue( ':id', $id );

        try {
            $stmt->execute();
        } catch ( PDOException $e ) {
            throw new RuntimeException( "Failed to delete contact: " . $e->getMessage() );
        }
	}

	public function get( mixed $id ) {
		// TODO: Implement get() method.
	}

	public function all(): array {

        $conn = $this->getConnection();

        $stmt = $conn->prepare( "SELECT * FROM $this->tableName" );

        $stmt->execute();

        $result = $stmt->fetchAll();

        if ( ! $result ) {

			return [];

		}

        $result = array_map(fn($array) => (object) $array, $result);

        return $result;
	}

	public function search( callable $predicate ): array {
        return [];
	}
}