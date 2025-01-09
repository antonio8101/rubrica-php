<?php

namespace Abruno\Rubrica\repository;

/**
 * @template T
 */
interface RepositoryContract {

	/**
	 * Migration script
	 *
	 * @return void
	 */
	public function createContainer(): void;

	/**
	 * Adds an element in the repository
	 *
	 * @param T $data
	 *
	 * @return void
	 */
	public function save($data): void;

	/**
	 * Deletes an element from the repository
	 *
	 * @param mixed $id
	 *
	 * @return void
	 */
	public function delete(mixed $id): void;

	/**
	 * Gets an element from the repository by id
	 *
	 * @param int $id
	 *
	 * @return T
	 */
	public function get(mixed $id);

	/**
	 * Returns a collection of elements
	 *
	 * @return T[]
	 */
	public function all(): array;

	/**
	 * Returns a collection of elements based on the filter expression
	 *
	 * @param callable(T): void $predicate
 *
	 * @return T[]
	 */
	public function search(callable $predicate): array;
}