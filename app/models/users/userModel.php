<?php

class userModel extends Model
{
    public function get()
    {
        return $this->db->get('user');
    }
    public function getData($whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->get('user');
    }

    public function getDataOrWhere($whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->orWhere($key, $value);
        }
        return $this->db->get('user');
    }

    public function getOneData($whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->getOne('user');
    }

    public function addData($data = [])
    {
        return $this->db->insert('user', $data);
    }

    public function updateData($data = [], $whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->update('user', $data);
    }

    public function deleteData($whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->delete('user');
    }

    public function rawQuery($query = '')
    {
        return $this->db->rawQuery($query);
    }
}
