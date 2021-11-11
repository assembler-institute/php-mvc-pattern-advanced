<?php

include_once ENTITIES . '/Content.php';

class ContentModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        if (EXECUTION_FLOW)
            echo '<p>Content model</p>';
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM contents;");
            while ($row = $query->fetch()) {
                $item = new Content();

                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->email = $row['email'];
                $item->text = $row['text'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById($id)
    {
        $item = new Content();

        $query = $this->db->connect()->prepare("SELECT * FROM contents WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->email = $row['email'];
                $item->text = $row['text'];
            }

            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function insert($data)
    {
        $result = "OK";
        try {
            //Insert data into DB
            $query = $this->db->connect()->prepare('INSERT INTO contents (name, email, text) VALUES(:name, :email, :text)');
            $query->execute(['name' => $data['name'], 'email' => $data['email'], 'text' => $data['text']]);
            return $result;
        } catch (PDOException $e) {
            //echo 'Error INSERT: ' . $e->getMessage();
            if ($e->errorInfo[1] == 1062) {
                return $result = "This email already exists";
            } else {
                return $result = "Database error";
            }
            //return $result = $e->getMessage();
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE contents SET name = :name, email = :email, text = :text WHERE id = :id");

        try {
            $query->execute([
                'id' => $item['id'],
                'name' => $item['name'],
                'email' => $item['email'],
                'text' => $item['text']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($item)
    {
        $query = $this->db->connect()->prepare("DELETE FROM contents WHERE id = :id");
        try {
            $query->execute([
                'id' => $item
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
