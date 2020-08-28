<?php



 $id = $_GET['c'];
 
    echo "Eliminado prontuarios cadastrados: $id <br>";
 
    $url = 'localhost';
    $user = 'root';
    $senha = '';
 
    $con = mysqli_connect($url, $user, $senha);
 
    $db = 'myhealth';
 
    mysqli_select_db($con, $db) or
        die ("Erro na selaçã do banco de dados" . 
            mysqli_error($sql)  );
 
    $sql="DELETE FROM prontuario WHERE id = $id ";
 
    //die($sql);
 
    mysqli_query($con , $sql) or
        die ("Erro na exclusão $id: "
            . mysqli_error($con)    );
 
    echo "Prontuario do paciente $id excluido com sucesso. <hr>";
    echo "<a href='listagem.php'>Listagem de pacientes</a>";
?>
    <!--Clique <a href='listagem.php'>aqui</a>para listagem de pacientes.
 </body>
 </html>-->