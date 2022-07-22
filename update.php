<?php
    require 'crudlivre.php';

    $book = new Crud();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $get = $book->GetBook($id);
    }
    
   
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $nom = $_POST["name"];
            $prix = $_POST["prix"];
            $id_categorie = $_POST["categorie"];
            $id_auteur= $_POST["author"];
    
            if ($book->updateBook($nom,$prix,$id_categorie, $id_auteur,$id)) {
                header("location; dashboard.php?success");
                exit();
            }else{
                echo "error";
            }
        }
    
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
<div class="row">
    <div class="col-md-8 mx-auto">
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?php echo $get['id']; ?>"> 
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo $get['nom']; ?>">
                                            <label for="name" class="form-label">name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="prix" id="prix" placeholder="prix" value="<?php echo $get['prix']; ?>">
                                            <label for="prix" class="form-label">prix</label>
                                        </div>
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Default select example" name="categorie" value="<?php echo $get['id_categorie']; ?>">
                                                <option selected>Open this select menu</option>
                                                <option value="1">kids</option>
                                                <option value="2">adults</option>
                                                <option value="3">science fiction</option>
                                              </select>
                                        </div>
                                        <div class="form-floating mt-3">
                                            <input type="text" class="form-control" name="author" id="author" placeholder="author" value="<?php echo $get['id_auteur']; ?>">
                                            <label for="author" class="form-label">author</label>
                                        </div>
                                        <input type="submit" class="btn btn-secondary form-control" data-bs-dismiss="modal" value="ADD NEW BOOK" name="edit">
                                    </form> 
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>