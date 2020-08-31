<?php
$ano = date("Y");
include "sessao.php";
include "../plugin/coneccao.php";
?>
<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <title>Ideia | Chega de incomodar seus amigos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="../plugin/images/icon.png">
        <!--Bootstrap -->
         
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/4.7.0/css/bootstrap.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
        
        <link rel="stylesheet" href="../plugin/css/menu.css">
        <link rel="stylesheet" href="../plugin/css/footer.css">
        
        <!--Google AdSense-->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4977378894211740",
    enable_page_level_ads: true
  });
</script>
    </head>
    <body style="background:#F5F5F5">
         
       <?php
    include "nav.php";
    ?>
        
        
        <?php
        $cod = $_GET["codigo"];
                    $sql = "SELECT* FROM evento where codigo=$cod;";
                    $result = mysqli_query($connect, $sql) or die("Error:" . mysqli_error($connect));
                    $row = mysqli_fetch_array($result);
                       $cod = $row["codigo"];
        
                        ?>
        
        <div class="nav-scroller bg-dark box-shadow" style="padding-top:75px;">
      <nav class="nav nav-underline">
        <a class="nav-link" href="minfo.php?codigo=<?php echo $cod; ?>" style="color:#ccc;">Editar Evento</a>
        <a class="nav-link" href="mimagem.php?codigo=<?php echo $cod; ?>" style="color:#ccc;">Editar Imagem</a>
      </nav>
    </div>
        
           <main role="main" class="container">
      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados do Evento</h4>
            <ul class="list-group mb-8">
                                                                                                                            <li class="list-group-item  lh-condensed">
          <form action="eevento.php?codigo=<?php echo $cod; ?>" method="post">
            

            <div class="mb-3">
              <label for="nome">Nome do evento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do evento (Ex: festa 3)" name="nome" value="<?php echo $row['nome']; ?>" required>
                
              </div>
            </div>
<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Local do evento</label>
                                                     <div class="input-group">
               
                <input type="text" class="form-control" id="contacto" placeholder="Digite o local (Ex: bar maputo)" name="local" value="<?php echo $row['local']; ?>" required>
                
              </div>
                                                </div>
                                            </div>
                                            
              
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Endereco</label>
                                                    <input type="text" class="form-control" placeholder="Digite o endereco (Ex: avenida 24 de julho)" name="endereco" value="<?php echo $row['endereco']; ?>" required>
                                                     <small class="form-text text-muted">

      Em Mocambique apenas.
    </small>
                                                </div>
                                            </div>
                                        </div>
              <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Categoria</label>
                                                    <div class="form-group">
    <select class="form-control" name="categoria">
      <option><?php echo $row['categoria']; ?></option>
      <option>Desporto</option>
      <option>Musica</option>
      <option>Gastronomia</option>
      <option>Conferencia</option>
      <option>Educacao</option>
      <option>Artes</option>
      <option>Outra</option>
    </select>
  </div>

                                                </div>
                                            </div>
             
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Data e Hora de inicio</label>
                                                    <div class="input-group">
  
  <input type="date" class="form-control" name="data" value="<?php echo $row['data']; ?>" required>
  <input type="time" class="form-control" name="hora" value="<?php echo $row['hora']; ?>" required>
</div>
                                                     <small class="form-text text-muted">

      A data nao pode ser igual ou inferior ao dia de hoje.
    </small>
                                                </div>
                                            </div>
                                        </div>
            
            <div class="mb-3">
             <div class="form-group label-floating">
                                                    <label class="control-label">Bilhete</label><small class="form-text text-muted">

      Se o evento for gratis nao preencha.
    </small>
                 <?php
                        $bilhetes = $row["bilhete"];
                        $bilhete = explode(";", $bilhetes);
                 $e=1;
                        foreach ($bilhete as $b) {
                            ?>
      <div class="input-group">
  

  <input type="text" class="form-control" placeholder="Tipo de bilhete e preco (Ex: outro - 500)" name="b<?php echo $e; ?>" value="<?php echo $b; ?>">
                                                        <div class="input-group-append">
    <span class="input-group-text">.00 Mt</span>
  </div>

</div>
     
                            <?php
                            $e++;
                        }
                        ?>
                
               
                 <input type="hidden" name="e" value="<?php echo $e;?>">
                </div>
                
            </div>
              
                                           
                                            
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Descricao</label>
                                                    <div class="input-group" id="po" >
                                                            <textarea class="form-control" id="po" aria-label="With textarea" name="descricao"  required><?php echo $row['descricao']; ?></textarea>
                                                             <style>
                                                            @media(min-width:990px){
                                                                textarea,#po{
                                                                    width:500px;
                                                                }
                                                            }
                                                            </style>
</div>
                                                     
                                                </div>
                                            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Editar</button>
          </form>
                </li>
            </ul>
        </div>
          <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <div class="dropdown-divider"></div>
            <span class="text-muted">Publicidade</span>
          </h4>
               <div style="width:100%;height:300px ;border:solid 1px yellow"> Google ads
               </div>
           
              <div class="clearfix"></div>
        
        </div>
      </div>
                </main>
            
            <?php
        include "../plugin/footer.php";
        ?>
    </body>
     <script src="https://cloud.tinymce.com/stable/tinymce.min.js" ></script>
              <script >
        tinymce.init({selector:'textarea'});
</script>
    <!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
</html>