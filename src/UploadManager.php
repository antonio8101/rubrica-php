<?php

namespace Abruno\Rubrica;

class UploadManager implements UploadManagerContract {

	/**
	 * @param Request $request
	 *
	 * @return string|null
	 */
	public function manage( Request $request ): ?string {

		$picturePublicPath = null;

		$pictureImage = $request->files['pic'] ?? null;

		if ( isset( $pictureImage['tmp_name'] ) ) {

			if ( is_uploaded_file( $pictureImage['tmp_name'] ) ) {

				$uuid    = $this->getId(); // identificativo random
				$name    = $uuid . $pictureImage['name'];
				move_uploaded_file( $pictureImage['tmp_name'], __DIR__ . "/../html/images/" . $name );
				$picturePublicPath = "images/" . $name;
			}
		}

		return $picturePublicPath;
	}

	private function getId():string{
		return rand(1, 5000000);
	}
}