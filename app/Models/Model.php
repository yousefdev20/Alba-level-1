<?php

include_once __DIR__ . '/../../system/Core/Database/Connection.php';

abstract class Model extends Connection
{
    public string $table_name;

    protected ?string $order = null;

    protected ?array $with = null;

    protected ?array $where = null;

    protected ?array $select = null;

    protected ?int $limit = null;

    private ?string $query = null;

    public static function query(): static
    {
        return new static();
    }

    public function insert(array $data): mysqli_result|bool
    {
        $keys = implode(', ',array_keys($data));

        $values = array_map(function($item) {
            return "'$item'";
        }, array_values($data) ?? []);

        $values = implode(', ', $values);

        $query = "INSERT INTO `$this->table_name` ($keys) VALUES ($values)";

        return mysqli_query($this->init(), $query);
    }
    public function update(array $data): mysqli_result|bool
    {
        $stringQuery = '';

        $countAttributes = count($data);
        $iterators = 0;

        foreach ($data as $key => $item) {
            $iterators += 1;
            if ($countAttributes != $iterators) {
                $stringQuery .= "$key = '$item', ";
            }else {
                $stringQuery .= "$key = '$item'";
            }
        }

        $query = "UPDATE `$this->table_name` SET $stringQuery";

        if ($this->where) {
            $key = array_keys($this->where)[0] ?? '';
            $value = array_values($this->where)[0] ?? '';

            $query .= " WHERE $key = '$value'";
        }

        return mysqli_query($this->init(), $query);
    }

    /**
     * @param array $columns
     * @return Model
     */
    public function select(array $columns): static
    {
        $this->select = $columns;

        return $this;
    }
        public function delete(): mysqli_result|bool
        {
        $query = "DELETE FROM $this->table_name";

        if ($this->where) {
            $key = array_keys($this->where)[0] ?? '';
            $value = array_values($this->where)[0] ?? '';

            $query .= " WHERE $key = '$value'";
        }

        return mysqli_query($this->init(), $query);
    }

    public function latest(string $column = 'id'): static
    {
        $this->order = " ORDER BY $column DESC";

        return $this;
    }

    /**
     * @param array<array> $relations
     * @return Model
     */
    public function with(array $relations): static
    {
        $this->with = $relations;

        return $this;
    }

    /**
     * @param array $conditions
     * @return $this
     */
    public function where(array $conditions): static
    {
        $this->where = $conditions;

        return $this;
    }

    public function limit(int $page = 10): static
    {
        $this->limit = $page;

        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        $columns = implode(', ', $this->select);

        $this->query = "SELECT $columns FROM `$this->table_name`";

        foreach ($this->with ?? [] as $relation) {

            $first_table = $relation['first_table'] ?? '';
            $second_table = $relation['second_table'] ?? '';
            $first_key = $relation['first_key'] ?? '';
            $second_key = $relation['second_key'] ?? '';

            $this->query .= " LEFT JOIN $first_table ON $first_table. `$first_key` = $second_table. `$second_key`";

            foreach ($this->where as $key => $value) {
                $IsConditionInRelation = explode('.', $key)[0];

                if ($IsConditionInRelation === $first_table) {
                    $this->query .= " AND $key = '$value'";
                    unset($this->where[$key]);
                }
            }
        }

        if ($this->where) {

            $iterator = 0;
            $items = count($this->where);

            $where = ' WHERE ';

            foreach ($this->where as $key => $value) {
                $iterator +=1;
                if ($items != $iterator) {
                    $where .= "$key = '$value' AND ";
                }else {
                    $where .= "$key = '$value'";
                }
            }

            $this->query .= $where;
        }

        if ($this->order) {
            $this->query .= "$this->order";
        }

        if ($this->limit) {
            $this->query .= " LIMIT $this->limit";
        }

        $result = mysqli_query($this->init(), $this->query);

        return mysqli_fetch_all($result);
    }
}