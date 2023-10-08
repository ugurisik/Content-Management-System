<?php

class sampleModel extends Model
{
    public function get($table = 'sample')
    {
        return $this->db->get($table);
    }
    public function getData($table = 'sample', $whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->get($table);
    }
    public function getDataOrWhere($table = 'sample', $whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->orWhere($key, $value);
        }
        return $this->db->get($table);
    }
    public function getOneData($table = 'sample', $whereParams = [])
    {

        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->orderBy('ID', 'desc');
        return $this->db->getOne($table);
    }

    public function addData($table = 'sample', $data = [])
    {
        return $this->db->insert($table, $data);
    }

    public function updateData($table = 'sample', $data = [], $whereParams = [], $whereSigns = [])
    {
        foreach ($whereParams as $key => $value) {
            if (empty($whereSigns[$key])) {
                $whereSigns[$key] = '=';
            }
            $this->db->where($key, $value, $whereSigns[$key]);
        }
        return $this->db->update($table, $data);
    }

    public function deleteData($table = 'sample', $whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->delete($table);
    }

    public function rawQuery($query = '')
    {
        return $this->db->rawQuery($query);
    }
}
