<?php

namespace interfaces;

interface Repository {
  function findAll(int $id): array;
  function findById(int $id): ?object;
  function save(object $entity): ?object;
  function rempve(int $id): bool;
}