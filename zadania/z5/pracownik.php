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

      class Pracownik
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
           $sql	= 'SELECT * from pracownik_all order by nazwisko';
  	       $lista = $this->pdo->query($sql);
           $no=0;
           echo "<hr>";
           echo " <strong> Pracownicy </strong> <br><br>";
           echo '<form name="formularz_edycja" method="post" action="pracownik.php">';
           echo "    <table> ";
  	       foreach($lista as $elem)
           {
             $no++;
             echo '<tr>','<td>',$no,'</td><td>',$elem['imie'],'</td><td>',$elem['nazwisko'],'</td><td>',$elem['marka'],'</td><td>',$elem['model'],'</td>
             <td> <button name="subject1" type="submit" value='.$elem['pracownik_id'].'>Edytuj</button> </td>
             <td> <button name="subject2" type="submit" onclick="return confirm(\'Czy jesteś pewiem, że chcesz usunąć?\');" value='.$elem['pracownik_id'].'>Usuń</button>  </td></tr>';
             #echo $elem['pracownik_id'];
           }
  	       $lista->closeCursor();
           echo "    </table>";
           echo '<br>';
           echo '<button name="subject3" type="submit" value="dodaj" >Dodaj</button>';
          echo '</form>';
         }

         function zapisz($imie,$nazwisko,$auto)
         {
           #echo $imie,$nazwisko,$auto;
           $zapytanie = $this->pdo->prepare('INSERT INTO pracownik (imie,nazwisko,auto_id) VALUES(?,?,?)');
           $zapytanie->execute(array($imie,$nazwisko,$auto));
          }
         function dodaj()
         {
           $sql2	= 'SELECT * from auto;';
           $lista2 = $this->pdo->query($sql2);
           echo '<hr>
           <form name="formularz_pracownik" method="post" action="pracownik.php">
                 Dodaj :
                 <input type="text" name="imie" pattern=".{3,30}" required title="To jest pole wymagane (3-30 znaków)" />
                 <input type="text" name="nazwisko" pattern=".{3,30}" required title="To jest pole wymagane (3-30 znaków)" />
                 <select name="auto">';
                   foreach($lista2 as $elem2)
                   {
                     echo '<option value='.$elem2['auto_id']. '> ' .$elem2['marka'].' '.$elem2['model']. ' </option>';
                   }
                   $lista2->closeCursor();
                   echo '<option selected="selected" > </option>' ;
                 echo '
                 </select>
                 <input type="submit" name="button_dodaj_pracownika" value="Dodaj" onclick="return dodaj();" />
          </form>';
        }
        function usun($pracownik_id)
        {
          $zapytanie = $this->pdo->prepare('DELETE from pracownik where pracownik_id= ?');
          $zapytanie->execute(array($pracownik_id));
        }
        function edytuj($pracownik_id)
        {
          $zapytanie9 = $this->pdo->prepare('Select imie,nazwisko from pracownik where pracownik_id = ?');
          $zapytanie9->execute(array($pracownik_id));
          foreach($zapytanie9 as $elem9){
            $imie = $elem9['imie'];
            $nazwisko = $elem9['nazwisko'];
          }
          #echo $imie, $nazwisko;

          $sql2	= 'SELECT * from auto;';
          $lista2 = $this->pdo->query($sql2);
          echo '<hr>
          <form name="formularz_pracownik" method="post" action="pracownik.php">
                Edytuj pracownika '.$imie.' '.$nazwisko.' :
                <input type="text" name="imie" pattern=".{3,30}" required title="To jest pole wymagane (3-30 znaków)" />
                <input type="text" name="nazwisko" pattern=".{3,30}" required title="To jest pole wymagane (3-30 znaków)" />
                <select name="auto">';
                  foreach($lista2 as $elem2)
                  {
                    echo '<option value='.$elem2['auto_id']. '> ' .$elem2['marka'].' '.$elem2['model']. ' </option>';
                  }
                  $lista2->closeCursor();
                  echo '<option selected="selected" > </option>' ;
                echo '
                </select>
                <button name="update_pracownika" type="submit" value='.$pracownik_id.'>Zaktualizuj</button>
         </form>';
        }
        function aktualizuj($pracownik_id,$imie,$nazwisko,$auto)
        {
          #echo $pracownik_id,$imie,$nazwisko,$auto;
          $zapytanie = $this->pdo->prepare('Update pracownik set imie=?, nazwisko=?, auto_id=? WHERE pracownik_id=?;');
          $zapytanie->execute(array($imie,$nazwisko,$auto,$pracownik_id));
        }


      }

      $main = new Pracownik('wyjazdy.db');
      $main -> wyswietl();
      #$main -> dodaj();

      if(isset($_POST['button_dodaj_pracownika']))
        {
          #echo $_POST['imie'],$_POST['nazwisko'],$_POST['auto'];
          $main -> zapisz($_POST['imie'],$_POST['nazwisko'],$_POST['auto']);
          echo '<meta http-equiv="refresh" content="1; url=http://localhost/pracownik.php">';
        }
     if(isset($_POST['subject1']))
        {
          #echo $_POST['subject1'];
          $main -> edytuj($_POST['subject1']);
          #echo '<meta http-equiv="refresh" content="1; url=http://localhost/pracownik.php">';
        }

     if(isset($_POST['subject2']))
       {
          #echo $_POST['subject2'];
          $main -> usun($_POST['subject2']);
          echo '<meta http-equiv="refresh" content="1; url=http://localhost/pracownik.php">';
       }

     if(isset($_POST['subject3']))
       {
         #echo "test";
         $main -> dodaj();
         #echo '<meta http-equiv="refresh" content="1; url=http://localhost/pracownik.php">';
       }

     if(isset($_POST['update_pracownika']))
        {
           #echo $_POST['imie'],$_POST['nazwisko'],$_POST['auto'],$_POST['update_pracownika'] ;
           $main -> aktualizuj($_POST['update_pracownika'],$_POST['imie'],$_POST['nazwisko'],$_POST['auto']);
           echo '<meta http-equiv="refresh" content="1; url=http://localhost/pracownik.php">';
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
