<?php

interface DTO {
	function findAll(): array;
	function findById(int $id): ?object;
	function save(object $entity): bool;
	function remove(int $id): bool;
}
