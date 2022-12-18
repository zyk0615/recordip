<?php

namespace ZYKUtil\RecordIp;

use Illuminate\Support\Facades\DB;

trait DBTrait
{
    protected string $table;
    protected string $connection;

    public function setConnection($connection): static
    {
        $this->connection = $connection;
        return $this;
    }

    public function setTable($table): static
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return \Illuminate\Contracts\Database\Query\Builder
     */
    protected function getDBQuery(): \Illuminate\Contracts\Database\Query\Builder
    {
        return DB::connection($this->connection)->table($this->table);
    }
}
