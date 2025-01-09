<?php

namespace Abruno\Rubrica\repository\json;

use Abruno\Rubrica\repository\RepositoryContract;

class ContactRepository implements RepositoryContract{

	private string $fileName = "contacts.json";

	private string $folderPath = __DIR__ . '/data/';

	private string $filePath;

	public function __construct(){
		$this->filePath = $this->folderPath . $this->fileName;
	}

	public function createContainer(): void {

		if(!file_exists($this->folderPath)){
			mkdir($this->folderPath, 0777, true);
		}

		if(!file_exists($this->filePath)){
			file_put_contents($this->filePath, json_encode(new \stdClass()));
		}		
	}

	public function save( $data ): void {
		// TODO: Implement save() method.
	}

	public function delete( mixed $id ): void {
		// TODO: Implement delete() method.
	}

	public function get( mixed $id ) {
		// TODO: Implement get() method.
	}

	public function all(): array {
		return [];
	}

	public function search( callable $predicate ): array {
		return [];
	}
}