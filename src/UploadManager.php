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

			if ( $this->is_uploaded_file( $pictureImage['tmp_name'] ) ) {

				$uuid    = $this->getId();
				$name    = $uuid . $pictureImage['name'];
				$this->move_uploaded_file( $pictureImage['tmp_name'], __DIR__ . "/../html/images/" . $name );
				$picturePublicPath = "images/" . $name;
			}
		}

		return $picturePublicPath;
	}

	private function getId():string{
		return rand(1, 5000000);
	}

	private function is_uploaded_file( $file ):bool {
		return is_uploaded_file( $file );
	}

	private function move_uploaded_file( string $from, string $to ):void {
		move_uploaded_file( $from, $to );
	}

}