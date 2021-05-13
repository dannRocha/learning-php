<?php

namespace Interfaces;

interface Repository {
  function findAll(): array;
  function findById(int $id): ?object;
  function save(object $entity): bool;
  function remove(int $id): bool;
}
