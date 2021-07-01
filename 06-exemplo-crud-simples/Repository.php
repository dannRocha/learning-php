<?php

class Repository {

  protected static $pdo = null;
  
  public static function save( $data): void {
    
    try {
      $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=user;user=root;password=");
      $smt = $pdo->prepare("INSERT INTO users (name, last) VALUES (:name, :last)");
      $smt->execute(['name' => $data[0], 'last' => $data[1]]);

    } catch (Exception $e) {
      var_dump($e);
    }
  }

  public static function findAll(): array {

    try {

      $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=user;user=root;password=");
      $smt = $pdo->prepare("SELECT * FROM users");
      $smt->execute();
      return $smt->fetchAll();

    } catch (Exception $e) {
      var_dump($e);
    }

    return [];
  }

  public static function findById(int $id): array {

    try {

      $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=user;user=root;password=");
      $smt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
      $smt->execute(['id' => $id]);
      $result = $smt->fetch();

      return is_bool($result) ? [] : $result ;

    } catch (Exception $e) {
      var_dump($e);
    }

    return [];
  }

  public static function has(int $id): bool {
    return count(self::findById($id)) !== 0;
  }

  public static function update(int $id, array $data) {
    try {

      $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=user;user=root;password=");
      $smt = $pdo->prepare("UPDATE users SET name=:name, last=:last WHERE id=:id");
      $smt->execute(['name' => $data['name'], 'last' => $data['last'], 'id' => $data['id']]);
  
    } catch (Exception $e) {
      var_dump($e);
    }

  }

  public static function deleteById(int $id) {
    try {

      $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=user;user=root;password=");
      $smt = $pdo->prepare("DELETE FROM users WHERE id=:id");
      return $smt->execute(['id' => $id]);
      

    } catch (Exception $e) {
      var_dump($e);
    }

    return false;    
  }
}
