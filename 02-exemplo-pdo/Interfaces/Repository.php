<?php

namespace Interfaces;

interface Repository {
  function findAll(int $page, int $limit): array;
  function findById(int $id): ?object;
  function save(object $entity): object;
  function remove(int $id): bool;
}
