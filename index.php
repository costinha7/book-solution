<?php

session_start();
ob_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/index.css">
<link rel="icon" href="assets/img/faviconx.png" type="image">
<title>Book Solution</title>

</head>

<body>
    <div class="lottie-bg">
        <lottie-interactive path="assets/lotties/bookbg0.json"  background="transparent" speed="1.0" loop  autoplay style="left:0; right:0; top:0; bottom:0; position: absolute;">
    </div>  
    
    <div class="center">
     <div class="logoindex"><img  src="assets/img/logoindex.png"></img>
     </div>
      <form method="POST" action="login.php">
        <div class="txt_field">
          <input type="text" required name="usuario_funcionario" value="<?php if(isset($dados['usuario_funcionario'])){ echo $dados['usuario_funcionario']; } ?>">
          <span></span>
          <label>Usuário</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="senha_funcionario" value="<?php if(isset($dados['senha_funcionario'])){ echo $dados['senha_funcionario']; } ?>">
          <span></span>
          <label>Senha</label>
        </div>
        <i class="pass" style="text-decoration:none;cursor: text;">Login: alradmin</i>
        <i class="pass" style="text-decoration:none;cursor: text;">Senha: ALR#1245#</i>
        <br><br>
       <div class="pass"></div>
        <div class='field' style='color: #ff0000'>
<?php 

if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}

?>

        </p></div>
        <input type="submit" value="Login" name="login">        
        <div class="signup_link">
         <!-- Não é membro? <a href="#">Cadastre-se</a>-->
        </div>        
      </form>
    </div>
   
  
        <!--  Custom Scripts       -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script type="text/javascript" src="https://unpkg.com/lottie-interactive@latest/dist/lottie-interactive.js"></script>


</body>

</html>