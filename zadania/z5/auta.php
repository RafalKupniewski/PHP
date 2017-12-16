<!DOCTYPE html>
  <html>
    <head>
      <meta charset=utf-8>
      <title>Wyjazdy służbowe</title>
      <meta name="Autor" content = "Rafal Kupniewski">

      <link rel="stylesheet" media=all href="rk.css">


    </head>
<body>
  <p id=poczatek>
  <header><h1>  Wyjazdy służbowe  </h1></header>
    <nav>

      <ol start ="1" >
        <li><a href="index.php"> Wyjazdy </a> </li>
        <li> <a href="pracownik.php"> Pracownik ...</a></li>
        <li> <a href="miasta.php"> Miasta </a></li>
        <li> <a href="auta.php"> Auta </a></li>


      </ol> <br><br> <br><br> <br><br>
      <p id="czas"></p>
      <script>
        var display=setInterval(function(){Time()},0);
        function Time()
          {
            var date=new Date();
            var time=date.toLocaleTimeString();
            document.getElementById("czas").innerHTML=time;
          }
      </script>
    </nav>

    <article>
    <section>
    <?php

      class Auta
      {
        private $pdo=null;

        function __construct($nazwa)
        {
          try {
          $this->pdo = new PDO('sqlite:'.$nazwa);
          //echo 'sqlite:'.$nazwa;
          // Set errormode to exceptions
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }
          catch(PDOException $e) {echo 'Połączenie nie mogło zostać utworzone:<br> ' . $e->getMessage();}
        }

        function wyswietl()
        {
           $sql	= 'SELECT * from auto';
  	       $lista = $this->pdo->query($sql);
           $no=0;
           echo "<hr>";
           echo " <strong> Auta </strong> <br><br>";
           echo "    <table> ";
  	       foreach($lista as $elem)
           {
             $no++;
             echo '<tr>','<td>',$no,'</td><td>',$elem['marka'],'</td><td>',$elem['model'],'</td>','</tr>';
           }
  	       $lista->closeCursor();
           echo "    </table>";
         }

         function dodaj($marka,$model)
         {
            $zapytanie = $this->pdo->prepare('INSERT INTO auto (marka,model) VALUES(?,?)');
        	  $zapytanie->execute(array($marka,$model));
            #$main->wyswietl();
         }



      }

      $main = new Auta('wyjazdy.db');
      $main -> wyswietl();

      echo '<hr>
      <form name="formularz_miasto" method="post" action="auta.php">
            <input type="text" name="marka" pattern=".{3,30}" required title="To jest pole wymagane (3-30 znaków)" />
            <input type="text" name="model" pattern=".{2,30}" required title="To jest pole wymagane (2-30 znaków)" />
            <input type="submit" name="button_dodaj_auto" value="Dodaj" onclick="return dodaj();" />
     </form>';

      if(isset($_POST['button_dodaj_auto']))
        {
          $main -> dodaj($_POST['marka'],$_POST['model']);
          echo '<meta http-equiv="refresh" content="0; url=http://localhost/auta.php">';
        }
      ?>




      <hr>
      <p>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
          <img style="border:0;width:88px;height:31px"
          src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
          alt="Poprawny CSS!" />
        </a>
      </p>
    <hr>
     <a href="#poczatek"> Początek </a>
    </section>
  </article>

  <footer> <p> Walka z PHP </p> </footer>
</body>
</html>
