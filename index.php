

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="jumbotron">
                    <h1 class="display-4">Login</h1>
                  <form action="index.php" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                     <input type="text" class="form-control" name="login" aria-describedby="emailHelp">
                         <small class="form-text text-muted">Entre com seus dados de acesso</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                     <input type="password" class="form-control" name="senha">
                    </div>
                <button type="submit" class="btn btn-primary">Acessar</button>
                  </form>
                    <?php 

                    if(isset($_POST['login'])){
                        $login = $_POST['login'];
                        $senha = md5($_POST['senha']);

                        include "restrito/conexao.php";
                        $sql = "SELECT * from `usuarios` WHERE login = '$login' AND senha = '$senha'";

                        if($result = mysqli_query($conn, $sql)){
                            $num_registros = mysqli_num_rows($result);
                            if($num_registros == 1){
                                $linha = mysqli_fetch_assoc($result);

                                if(($login == $linha["login"]) and ($senha == $linha["senha"])) {
                                    session_start();
                                    $_SESSION['login'] = "Walter";
                                    header("location: restrito");
                                }else{
                                    echo "Login inválido!";
                                }
                            }else{
                                echo "Login ou senha não encontrados ou inválidos";
                            }
                        } else{
                            echo "Nenhum resultado do banco de dados";
                        }   
                    }
                    ?>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <!-- jquery, popper.js, bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
