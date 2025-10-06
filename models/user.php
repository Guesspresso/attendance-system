<?php

class User {
    private $users = [
        [
            "id" => 3285723094687239, 
            "name" => "Alice Cornejo", 
            "department" => "HR",
            "email" => "alice@example.com",
        ],
        [  
            "id" => 173287985427654, 
            "name" => "Bob Marindoque", 
            "department" => "Construction",
            "email" => "bob@example.com",
        ]
    ];
    public function getAllUsers() {
        return $this->users;
    }
    public function getUserByID($id) {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) return $user;
        }
        return null;
    }
}