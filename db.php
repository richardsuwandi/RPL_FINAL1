<?php

class db{
    public function __construct()
    {
        try{
            // Hostname, username, password dan db masih dalam bentuk local
            // Ubah ini, jika mau dicocokan sama database online.
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $db = 'optoelektronik';
            
            $this-> pdo = new PDO("mysql:host=$hostname;port=3306;dbname=$db",$username, $password);
            $this-> pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e ->getMessage();
        }
    }

    // Fungsi untuk menambah data ke tabel barang
    public function membuat_barang($nama_barang, $spesifikasi_barang1, $spesifikasi_barang2, $gambar_barang1, $gambar_barang2){
        $sql = "INSERT INTO barang (nama_barang, spesifikasi_barang1, spesifikasi_barang2, gambar_barang1, gambar_barang2)
        VALUES (:nama_barang, :spesifikasi_barang1, :spesifikasi_barang2, :gambar_barang1, :gambar_barang2)";
        $query = $this -> pdo -> prepare($sql);
        $query -> execute(array(
            ':nama_barang' => $nama_barang,
            ':spesifikasi_barang1' => $spesifikasi_barang1,
            ':spesifikasi_barang2' => $spesifikasi_barang2,
            ':gambar_barang1' => $gambar_barang1,
            ':gambar_barang2' => $gambar_barang2));
        return $query;
    }

    //Fungsi untuk search.php
    public function search_barang($search){
        $sql = "SELECT * FROM barang WHERE nama_barang LIKE :search";
        $query = $this -> pdo -> prepare($sql);
        $query -> execute(array(
            ':search' => '%'.$search.'%'));
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_barang($barang){
        $sql = "SELECT * FROM barang WHERE barang = :zip";
        $stmt = $this -> pdo ->prepare($sql);
        $stmt->execute(array(':zip' => $barang));
        return $stmt -> fetch();
    }

    public function login($email){
        $sql = "SELECT * FROM account WHERE email = :email";
        $stmt = $this -> pdo -> prepare($sql);
        $stmt -> bindParam(':email', $email);
        $stmt -> execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}