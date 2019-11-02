<?php
namespace App\Repositories;

use App\DataBase\Connection;

class PhoneRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::creatConnect();
    }

    public function get(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM phone WHERE id = :id');
        $stmt->bindValue('id', $id, \PDO::PARAM_INT );
        $stmt->execute();
    }

    public function getList()
    {
        $stmt = $this->pdo->query('SELECT * FROM phone');

        return $stmt->fetchAll();
    }

    public function update(int $id, array $phone)
    {
        $stmt = $this->pdo->prepare(' UPDATE phone  SET 
                   phone = :phone
                     WHERE id = :id'
        );

        $phone = $phone['phone'];

        $stmt->bindParam('phone', $firstName, \PDO::PARAM_STR );
        $stmt->bindValue('id', $id, \PDO::PARAM_INT );

        $stmt->execute();
    }

    public function create(array $phone)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $phone['phone'],
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM phone WHERE id = :id');
        $stmt->bindValue('id', $id );

        $stmt->execute();
    }

    private function getStmtInsert(): \PDOStatement
    {
        return $this->pdo->prepare(
            'INSERT INTO phone (phone) VALUES(?)'
        );
    }
}