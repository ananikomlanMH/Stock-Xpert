<?php

namespace App\Components\QueryBuilder;

use App\Components\DB\DBConnect;
use Exception;


class QueryBuilder
{
    private string $table;

    private string $select = '*';

    private string $where = '';

    private string $orderBy = '';

    private string $joins = '';

    private array $params = [];

    private int $limit;

    private int $offset;

    private DBConnect $db;


    public function __construct(string $table)
    {
        $this->db = new DBConnect();
        $this->table = $table;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function select(array $columns): self
    {
        $this->select = implode(', ', $columns);
        return $this;
    }

    /**
     * @param string $column
     * @param string $operator
     * @param $value
     * @return $this
     */
    public function where(string $column, string $operator, $value): self
    {
        if (!empty($this->where)) {
            $this->where .= ' AND ';
        }
        $this->where .= "$column $operator '$value'";
        return $this;
    }

    /**
     * @param $column
     * @param string $direction
     * @return $this
     */
    public function orderBy($column, string $direction = 'ASC'): self
    {
        $direction = strtoupper($direction);
        if (!in_array($direction, ['ASC', 'DESC'])) $direction = 'ASC';
        $this->orderBy = "ORDER BY $column $direction";
        return $this;
    }

    /**
     * @param string $table
     * @param string $column1
     * @param string $operator
     * @param string $column2
     * @return $this
     */
    public function join(string $table, string $column1, string $operator, string $column2): self
    {
        $this->joins .= " INNER JOIN $table ON $column1 $operator $column2";
        return $this;
    }

    /**
     * @param string $table
     * @param string $column1
     * @param string $operator
     * @param string $column2
     * @return $this
     */
    public function leftJoin(string $table, string $column1, string $operator, string $column2): self
    {
        $this->joins .= " LEFT JOIN $table ON $column1 $operator $column2";
        return $this;
    }

    /**
     * @param string $table
     * @param string $column1
     * @param string $operator
     * @param string $column2
     * @return $this
     */
    public function rightJoin(string $table, string $column1, string $operator, string $column2): self
    {
        $this->joins .= " RIGHT JOIN $table ON $column1 $operator $column2";
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): self
    {
        if ($limit <= 0) $limit = 1;
        $this->limit = intval($limit);
        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset): self
    {
        $this->offset = intval($offset);
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function page(int $page): self
    {
        $this->offset = intval($this->limit * (intval($page) - 1));
        return $this;
    }


    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function setParams(string $key, $value): self
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function toSql(): string
    {
        $query = "SELECT $this->select FROM $this->table";
        $query .= $this->joins;
        if (!empty($this->where)) {
            $query .= " WHERE $this->where";
        }
        if (!empty($this->orderBy)) {
            $query .= " $this->orderBy";
        }

        if (!empty($this->limit)) {
            $query .= " LIMIT {$this->limit}";
        }

        if (!empty($this->limit) && !empty($this->offset)) {
            $query .= " OFFSET {$this->offset}";
        }
        return $query;
    }

    /**
     * @return bool|array
     */
    public function fetchAll(): bool|array
    {
            return $this->db->query($this->toSQL(), $this->params);
    }


    public function count(string $field): int
    {
        return (int)(clone $this)->select("COUNT($field) count")->limit(0)->fetchAll()[0]->count;
    }
}