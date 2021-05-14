<?php

namespace Factory;

abstract class AbstractConnectionFactory {
  abstract public function closeConnection(): void;
  abstract protected function openConnection(): ?object;
  abstract public function executeQuery(string $query, array $params): array;
}