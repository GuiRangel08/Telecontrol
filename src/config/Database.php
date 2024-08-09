<?php

namespace Config;

class Database
{
    private string $dsn;
    private \PDO $pdo;

    public function __construct(
        private ?string $host = null,
        private ?string $dbname = null,
        private ?string $username = null,
        private ?string $password = null,
        private ?array $options = null,
    ) {
        $host = $host ?? $_ENV['POSTGRES_HOST'];
        $dbname = $dbname ?? $_ENV['POSTGRES_DB'];

        $this->dsn = "pgsql:host=$host;dbname=$dbname";
        $this->username = $username ?? $_ENV['POSTGRES_USER'];
        $this->password = $password ?? $_ENV['POSTGRES_PASS'];
        $this->options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];

        $this->connect();
    }

    public function connect(): void {
        try {
            $this->pdo = new \PDO(
                $this->dsn,
                $this->username,
                $this->password,
                $this->options,
            );
        } catch (\PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = []): array {
        if ($this->pdo === null) {
            $this->connect();
        }
        // var_dump($sql, $params);die;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erro na execução da consulta: " . $e->getMessage());
        }
    }
}

