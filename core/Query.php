<?php

namespace App\Core;

use App\Core\Database;

class Query extends Database
{
    
    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';
    public $not = '';


    private function resetFields()
    {
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
        $this->not = '';
    }

    /**
     * Select table => table('users')
     *
     * @param string $table
     */
    public static function table(string $table)
    {
        $instance = new self();
        $instance->tableName = $table;
        return $instance;
    }

    /**
     * Select * => select()
     * Select field => select('id', 'name')
     */
    public function select(string $field = '*')
    {
        if (!empty($field)) {
            $this->selectField = $field;
        }
        return $this;
    }

    /**
     * Limit => limit(3 , 0) 
     *
     * @param integer $number => page
     * @param integer $offset => number of pages
     */
    public function limit(int $number, int $offset = 0)
    {
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }

    /**
     * Order by 1 field => orderBy('id', 'DESC')
     * Order by multi field => orderBy('name DESC, price ASC')
     *
     * @param [type] $field
     * @param string $type
     */
    public function orderBy(string $field = '', string $type = 'ASC')
    {
        $fieldArr = array_filter(explode(',', $field));
        if (!empty($fieldArr) && count($fieldArr) >= 2) {
            //SQL order by multi
            $this->orderBy = "ORDER BY " . implode(', ', $fieldArr);
        } else {
            $this->orderBy = "ORDER BY " . $field . " " . $type;
        }

        return $this;
    }

    /**
     * Where => where('id', '=', 1)
     * Where like => where('name', 'LIKE', '%name%')
     * Where multi => where('id', '=', 1)->where('name', 'LIKE', '%name%')
     *
     * @param string $field
     * @param string $compare
     * @param integer|string $value
     */
    public function where(string $field, string $compare, int|string $value)
    {
        if (empty($value)) {
            return $this;
        }

        if (empty($this->where)) {
            $this->operator = ' WHERE';
        } else {
            $this->operator = ' AND';
        }

        $this->where .= "$this->operator $field $compare $value";
        return $this;
    }

    public function orWhere(string $field, string $compare, int|string $value)
    {
        if (empty($value)) {
            return $this;
        }

        if (empty($this->where)) {
            $this->operator = ' WHERE';
        } else {
            $this->operator = ' OR';
        }

        $this->where .= "$this->operator $field $compare $value";
        return $this;
    }
    public function likeWhere(string $field, int|string $value)
    {
        if (empty($value)) {
            $this->where = '';
            return $this;
        } else {
            $operator = empty($this->where) ? ' WHERE' : ' AND';
            $this->where .= "$operator $field LIKE '%$value%'";
            return $this;
        }
    }

    /**
     * Join => join('users', 'users.id = posts.user_id')
     *
     * @param string $tableName
     * @param string $relationship
     */
    public function join(string $tableName, string $relationship)
    {
        $this->innerJoin .= " INNER JOIN $tableName ON $relationship";
        return $this;
    }
 
    public function not($field, $id) {
        $this->where .= " AND NOT $field = $id ";
        return $this;
    }

    /**
     * Get last id
     */
    public function lastId()
    {
        return $this->lastInsertId();
    }

    /**
     * Insert data => insert(['name' => 'name', 'email' => 'email'])
     *
     * @param string|array $data
     */
    public function insert(string|array $data)
    {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        $this->resetFields();
        return $insertStatus;
    }

    /**
     * Update data => update(['name' => 'name', 'email' => 'email'])
     *
     * @param string|array $data
     */
    public function update(string|array $data)
    {
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $tableName = $this->tableName;
        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
        $this->resetFields();
        return $updateStatus;
    }

    /**
     * Delete data => delete()
     * 
     */
    public function delete()
    {
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);
        $tableName = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        $this->resetFields();
        return $deleteStatus;
    }

 
    /**
     * Count data => count()
     * 
     */
    public function count()
    {
        $sqlQuery = "SELECT COUNT(*) FROM $this->tableName $this->where";
        $query = $this->query($sqlQuery);
        $this->resetFields();
        return $query ? $query->fetchColumn() : false;
    }

    /**
     * Get data => get()
     * 
     */
    public function get()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->not $this->orderBy $this->limit";
        $query = $this->query($sqlQuery);

        $this->resetFields();

        return $query ? $query->fetchAll(\PDO::FETCH_ASSOC) : false;
    }

    /**
     * Get one data => getOne()
     * 
     */
    public function getOne()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where";
        $query = $this->query($sqlQuery);

        $this->resetFields();

        return $query ? $query->fetch(\PDO::FETCH_ASSOC) : false;
    }
}