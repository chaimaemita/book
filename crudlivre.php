<?php
require_once 'database.php';

    class Crud extends Db{

            // INSERTION
        function insertBook($nom,$prix,$id_categorie, $id_auteur){
            $request=mysqli_query($this->conn ,"INSERT INTO livre (`nom`, `prix`, `id_categorie`, `id_auteur`) VALUES('$nom','$prix','$id_categorie', '$id_auteur')");

            if ($request) {
                return $request;
            }else{
                 echo "error";
            }
        }

            // AFFICHAGE
        function AffichBook(){
            $query = mysqli_query($this->conn , "SELECT * FROM livre ");
            return $query;
        }
        
            // UPDATE
        function GetBook($id){
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $q = mysqli_query($this->conn,"SELECT * FROM `livre` WHERE id = '$id");
                $data = mysqli_fetch_assoc($q);
                return $data;
            }
            
        }

        function updateBook($nom,$prix,$id_categorie, $id_auteur,$id){
            if (isset($_GET['id'])) {
                $query = mysqli_query($this->conn, "UPDATE `livre` SET `nom`='$nom',`prix`='$prix',`id_categorie`='$id_categorie',`id_auteur`='$id_auteur' where id='$id' ");
            if ($query) {
                return $query;
            }else {
                echo 'try again';
            }
        }
        }
    }

    




?>