<?php

namespace Abruno\Rubrica\repository\json;

use Abruno\Rubrica\repository\RepositoryContract;
use stdClass;

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
			file_put_contents($this->filePath, json_encode(new stdClass()));
		}		
	}

	public function save( $data ): void {
		$collection = $this->getCollection();

		$data->id = rand(0, 500000);

		$collection[] = $data;

		$this->updateCollection( $collection );
	}

	public function delete( mixed $id ): void {
		$collection = $this->getCollection();

		$newCollection = [];

		foreach($collection as $item){

			if($item['id'] == $id)
				continue;

			$newCollection[] = $item;
		}

		$this->updateCollection( $newCollection );
	}

	public function get( mixed $id ) {
		// TODO: Implement get() method.
	}

	public function all(): array {
		return $this->getCollection();
	}

	public function search( callable $predicate ): array {
		return [];
	}

	/**
	 * Returns the collection from the Json archive file
	 *
	 * @return mixed
	 */
	private function getCollection(): mixed {
		return json_decode( file_get_contents( $this->filePath ), true );
	}

	/**
	 * @param mixed $collection
	 *
	 * @return void
	 */
	public function updateCollection( mixed $collection ): void {
		$serialized = json_encode( $collection, JSON_PRETTY_PRINT );

		$resource = fopen( $this->filePath, 'w' );

		fwrite( $resource, $serialized );
		fclose( $resource );
	}
}