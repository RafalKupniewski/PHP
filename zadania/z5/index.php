<!DOCTYPE html>
  <html>
    <head>
      <meta charset=utf-8>
      <title>Wyjazdy Służbowe</title>
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

      <img width=160 height =100 src="diagram2.png" alt="Diagram" onclick="window.open('diagram.png', '_blank');">
      <br><br> <br><br>
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

      class Main
      {
        private $pdo=null;

        function __construct($nazwa)
        {
        try
          {
          $this->pdo = new PDO('sqlite:'.$nazwa);
          //echo 'sqlite:'.$nazwa;
          // Set errormode to exceptions
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }
        catch(PDOException $e) {echo 'Połączenie nie mogło zostać utworzone:<br> ' . $e->getMessage();}
        }

        function wyswietl()
        {
           $sql	= 'SELECT * from zestawienie order by data';
  	       $lista = $this->pdo->query($sql);
           $no=0;
           echo "<hr>";
           echo " <strong> Wyjazdy </strong> <br><br>";
           echo '<form name="formularz_edycja" method="post" action="index.php">';
           echo "    <table> ";
  	       foreach($lista as $elem)
           {
             $no++;
             echo '<tr><td>',$no,'</td><td>',$elem['imie'],'</td><td>',$elem['nazwisko'],'</td><td>',$elem['marka'],'</td><td>',$elem['model'],'</td><td>',$elem['miasto'],'</td><td>',$elem['data'],'</td>
             <td><button name="subject1" type="submit" value='.$elem['id'].'>Edytuj</button></td>
             <td>'.'<button name="subject2" type="submit" onclick="return confirm(\'Czy jesteś pewiem, że chcesz usunąć?\');"  value='.$elem['id'].'   >Usuń   </button>  </td></tr>';
           }
  	       $lista->closeCursor();

           echo '</table>';
           echo '<br>';
           echo '<button name="subject3" type="submit" value="dodaj" >Dodaj</button>';
           echo '</form>';


         }

         function zapisz($value1a,$value3a,$value4a)
         {
           $value2a=0;
           #echo $value1a,' ',$value3a,' ',$value4a;
           $zapytanie = $this->pdo->prepare('INSERT INTO pw (pracownik_id,cel_id) VALUES(?,?)');
           $zapytanie->execute(array($value1a,$value3a));
           $sql5	= 'SELECT pw_id from pw;';
           $lista5 = $this->pdo->query($sql5);
           foreach ($lista5 as $elem5){
             if ($value2a < $elem5['pw_id']) $value2a = $elem5['pw_id'];  }
           $lista5 ->closeCursor();
           $zapytanie2 = $this->pdo->prepare('INSERT INTO wyjazdy (pw_id,data) VALUES(?,?)');
           $zapytanie2->execute(array($value2a,$value4a));
          }

         function dodaj()
         {
           $sql1	= 'SELECT * from pracownik;';
           $sql2	= 'SELECT * from auto;';
           $sql3	= 'SELECT * from cel;';
           $lista1 = $this->pdo->query($sql1);
           $lista2 = $this->pdo->query($sql2);
           $lista3 = $this->pdo->query($sql3);
           echo ' <br> <br> <hr>
           <form name="form" action="index.php" method="post">
             Dodaj wyjazd:
           <select name="wybor1">';
             foreach($lista1 as $elem1)
             {
               echo '<option value='.$elem1['pracownik_id']. '> ' .$elem1['imie'].' '.$elem1['nazwisko']. ' </option>';
             }
             $lista1->closeCursor();
             echo '<option selected="selected" > </option>' ;
           echo '
           </select>
           <select name="wybor3">';
             foreach($lista3 as $elem3)
             {
               echo '<option value='.$elem3['cel_id']. '> ' .$elem3['miasto']. ' </option>';
             }
             $lista3->closeCursor();
             echo '<option selected="selected" >  </option>' ;
           echo '
           </select>';
           echo ' <label for="meeting">Data Wyjadu : </label><input id="wyjazd" name="wybor4" type="date" value="'.date('Y-m-d').'"/> ';
           echo '
           <input type="submit" name="submit" value="Wyślij" />
           </form>';
         }

         function usun($id)
         {
           $zapytanie = $this->pdo->prepare('DELETE from wyjazdy where id= ?');
           $zapytanie->execute(array($id));
         }

         function edytuj($id)
         {
           $sql1	= 'SELECT * from pracownik;';
           $sql2	= 'SELECT * from auto;';
           $sql3	= 'SELECT * from cel;';
           $lista1 = $this->pdo->query($sql1);
           $lista2 = $this->pdo->query($sql2);
           $lista3 = $this->pdo->query($sql3);

           $zapytanie10 = $this->pdo->prepare('Select imie,nazwisko from zestawienie where id = ?');
           $zapytanie10->execute(array($id));
           foreach($zapytanie10 as $elem10){
             $imie10 = $elem10['imie'];
             $nazwisko10 = $elem10['nazwisko'];
           }
           #echo $imie10, $nazwisko10;


           echo '<hr>
           <form name="formularz_wyjazdy" method="post" action="index.php">
             Edytuj wyjazd pracownika '.$imie10.' '.$nazwisko10.' :
           <select name="wybor5">';
             foreach($lista1 as $elem1)
             {
               echo '<option value='.$elem1['pracownik_id']. '> ' .$elem1['imie'].' '.$elem1['nazwisko']. ' </option>';
             }
             $lista1->closeCursor();
             echo '<option selected="selected" > </option>' ;
           echo '
           </select>
           <select name="wybor6">';
             foreach($lista3 as $elem3)
             {
               echo '<option value='.$elem3['cel_id']. '> ' .$elem3['miasto']. ' </option>';
             }
             $lista3->closeCursor();
             echo '<option selected="selected" >  </option>' ;
           echo '
           </select>';
           echo ' <label for="meeting">Data Wyjadu : </label><input id="wyjazd" name="wybor7" type="date" value="'.date('Y-m-d').'"/> ';
           echo ' <button name="update_wyjazdu" type="submit" value='.$id.'>Zaktualizuj</button>
          </form>';
         }
         function aktualizuj($id,$pracownik_id,$cel_id,$data)
         {
           echo $id,$pracownik_id,$cel_id,$data;
           $pw_id=0;
           $zapytanie = $this->pdo->prepare('INSERT INTO pw (pracownik_id,cel_id) VALUES(?,?)');
           $zapytanie->execute(array($pracownik_id,$cel_id));
           $sql5	= 'SELECT pw_id from pw;';
           $lista5 = $this->pdo->query($sql5);
           foreach ($lista5 as $elem5){
             if ($pw_id < $elem5['pw_id']) $pw_id = $elem5['pw_id'];  }
           $lista5 ->closeCursor();
           $zapytanie = $this->pdo->prepare('Update wyjazdy set pw_id=?, data=? WHERE id=?;');
           $zapytanie->execute(array($pw_id,$data,$id));
         }
     }

      $main = new Main('wyjazdy.db');
      $main -> wyswietl();
      #$main -> dodaj();

      if(isset($_POST['submit']))
      {
        $value1 = $_POST["wybor1"];
        $value3 = $_POST["wybor3"];
        $value4 = $_POST["wybor4"];
        $main -> zapisz($_POST["wybor1"],$_POST["wybor3"],$_POST["wybor4"]);
        echo '<meta http-equiv="refresh" content="1; url=http://localhost/index.php">';
      }
      if(isset($_POST['subject1']))
      {
        #echo $_POST['subject1'];
        $main -> edytuj($_POST['subject1']);
        #echo '<meta http-equiv="refresh" content="1; url=http://localhost/index.php">';
      }

      if(isset($_POST['subject2']))
      {
        #echo $_POST['subject2'];
        $main -> usun($_POST['subject2']);
        echo '<meta http-equiv="refresh" content="1; url=http://localhost/index.php">';
      }

      if(isset($_POST['subject3']))
      {
        #echo "test";
        $main -> dodaj();
        #echo '<meta http-equiv="refresh" content="1; url=http://localhost/index.php">';
      }

      if(isset($_POST['update_wyjazdu']))
      {
        #echo $_POST['wybor5'],$_POST['wybor6'],$_POST['wybor7'],$_POST['update_wyjazdu'] ;
        $main -> aktualizuj($_POST['update_wyjazdu'],$_POST['wybor5'],$_POST['wybor6'],$_POST['wybor7']);
        echo '<meta http-equiv="refresh" content="1; url=http://localhost/index.php">';
      }

      echo '<hr>';
      ?>
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
