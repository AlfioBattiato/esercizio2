<?php
// header('Location:/esercizio2/registration.php');
//questo header deve essere sempre in alto a tutti gli html o qualsiasi echo

echo '<pre>' . print_r($_POST, true) . '</pre>';
if ($_SERVER['REQUEST_METHOD'] == "POST") { //controllo se la richiesta è di tipo POST
    // header('Location:/esercizio2');
    $name = $_POST["nome"];
    $lastName = $_POST["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [];
//il filter var è un metodo di validazione nativo di php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }
    if (strlen($password) < 8) {
        $errors['password'] = 'La password deve contenere almeno 8 caratteri';
    }
    if($errors==[]){
         header('Location:/esercizio2/registration.php');

    }
   echo '<pre>'. print_r($errors,true)  . '</pre>';
}
?>

<!-- ///////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>form</title>
    <style>
        input {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="p-5 bg-dark text-white">
    <div class="container-fluid ">
        <!-- novalidate ci permette di non visualizzare gli errori di default dell email o altro dai da html nativo -->
        <form action="" method="post" novalidate>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" name="cognome" class="form-control" id="cognome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <!-- isset mi serve per controllare se il valore di una chiave di un array esiste -->
                <?php echo isset($errors["password"])?"<div class='text-danger'>$errors[password]</div>":"" ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>