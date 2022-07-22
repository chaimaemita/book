<?php
    require 'crudlivre.php';

    $book = new Crud();

    if (isset($_POST['add'])) {
        $nom = $_POST["name"];
        $prix = $_POST["prix"];
        $id_categorie = $_POST["categorie"];
        $id_auteur= $_POST["author"];

        if ($book->insertBook($nom,$prix,$id_categorie, $id_auteur)) {
            header("location; dashboard.php?success");
            exit();
        }else{
            echo "error";
        }
    }

    $data = $book->AffichBook();
    
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
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex justify-content-between align-items-end" style="border: 1px solid black; height: 15vh; border-radius: 5px; padding: 5% 5%;">
                    <h5 class="align-self-start">4 Books</h5>
                    <span><i class="bi bi-book"></i></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between align-items-end" style="border: 1px solid black; height: 15vh; border-radius: 5px; padding: 5% 5%;">
                    <h5 class="align-self-start">4 categories</h5>
                    <span><i class="bi bi-bookmark"></i></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between align-items-end" style="border: 1px solid black; height: 15vh; border-radius: 5px; padding: 5% 5%;">
                    <h5 class="align-self-start">4 authors</h5>
                    <span><i class="bi bi-person"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto" style="margin-top: 3%;">
                <div class="card">
                    <div class="card-header">
                        <h3>BOOKS</h3>
                        <button class="float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><i class="bi bi-plus"></i></span></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                                            <label for="name" class="form-label">name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="prix" id="prix" placeholder="prix">
                                            <label for="prix" class="form-label">prix</label>
                                        </div>
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Default select example" name="categorie">
                                                <option selected>Open this select menu</option>
                                                <option value="1">kids</option>
                                                <option value="2">adults</option>
                                                <option value="3">science fiction</option>
                                              </select>
                                        </div>
                                        <div class="form-floating mt-3">
                                            <input type="text" class="form-control" name="author" id="author" placeholder="author">
                                            <label for="author" class="form-label">author</label>
                                        </div>
                                        <input type="submit" class="btn btn-secondary" data-bs-dismiss="modal" value="ADD NEW BOOK" name="add">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Book</th>
                                    <th>Prix</th>
                                    <th>auteur</th>
                                    <th>categorie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $books){ ?>
                                <tr class="text-center">
                                    <td><?php echo $books['nom'];?></td>
                                    <td><?php echo $books['prix'];?></td>
                                    <td><?php echo $books['id_auteur'];?></td>
                                    <td><?php if ($books['id_categorie']  == 1) {
                                        echo '<span>kids</span>';
                                    }elseif($books['id_categorie']  == 2){
                                        echo '<span>adults</span>';
                                    }elseif($books['id_categorie']  == 3){
                                        echo '<span>science fiction</span>';
                                    }?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $books['id'];?>">EDIT</a>
                                        <a href="delete.php?id=<?php echo $books['id'];?>">Delete</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>