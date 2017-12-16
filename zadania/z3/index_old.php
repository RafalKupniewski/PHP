<!DOCTYPE html>
  <html>
    <head>
      <meta charset=utf-8>
      <title>Ankieta preferencji</title>
      <meta name="Autor" content = "Rafal Kupniewski">

      <link rel="stylesheet" media=all href="rk.css">


    </head>
<body>
  <p id=poczatek>
  <header><h1>  Ankieta  </h1></header>
    <nav>

      <ol start ="1" >
        <li><a href="#ankieta"> Ankieta </a> </li>
        <li><a href="#wyniki"> Wyniki </a> </li>
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

      <h3> Ankieta o...   </h3>


    <hr>
    <strong> Ankieta - najfajniejsze dziewczyny to: </strong> <br>
    <p id=ankieta>

      <?php
      class PlikJSON {

          private $nazwa;
          private $dane = array ();
          private $raw;
          private $puste = array();
          private $wynik = array();
          private $dane_a,$dane_b,$dane_c,$dane_d;



          public function __construct($nazwa="girls.json") {
            $this->nazwa=$nazwa;
          }

          public function sprawdz(){
            #$plik = "girls.json";
            if (file_exists($this->nazwa)) { echo "\n"; }
            else { #echo "nie ma" ;
              $dziewczyny = array ('Blondynki' => '0', 'Brunetki' => '0', 'Szatynki' => '0', 'Rude' => '0');
              $file = fopen($this->nazwa,"w");
              fwrite($file, json_encode($dziewczyny));
              fclose($file);
              }
          }

          public function odczyt(){
            if (file_exists($this->nazwa)) { echo "\n";
              $raw = file_get_contents($this->nazwa);
              $this->dane = json_decode($raw,true);
              $i=0;

              foreach ($this->dane as $dziewczyna => $punkt ){
                #echo $dziewczyna,' : ',$punkt,'<br>';
                if ($dziewczyna == 'Blondynki'){$this->dane_a = $punkt;}
                if ($dziewczyna == 'Brunetki'){$this->dane_b = $punkt;}
                if ($dziewczyna == 'Szatynki'){$this->dane_c = $punkt;}
                if ($dziewczyna == 'Rude'){$this->dane_d = $punkt;}
              }

              #echo $this->dane_a,$this->dane_b,$this->dane_c,$this->dane_d;
            }
          }

          public function zapisz($kolor){
            if ($kolor==1) {$this->dane["Blondynki"] += 1 ;}
            if ($kolor==2) {$this->dane['Brunetki'] += 1;}
            if ($kolor==3) {$this->dane['Szatynki'] += 1;}
            if ($kolor==4) {$this->dane['Rude'] += 1;}
            #echo $this->dane_a,$this->dane_b,$this->dane_c,$this->dane_d;
            #foreach ($this->dane as $dziewczyna => $punkt ){
            #  echo $dziewczyna,' : ',$punkt,'<br>';
            #}
            $file = fopen($this->nazwa,"w");
            fwrite($file, json_encode($this->dane));
            fclose($file);
            $this->wyswietl();
          }

          public function wyswietl(){
            echo "<hr>";
            echo "<p id=wyniki>";
            echo " <strong> Wyniki </strong>";
            echo "    <table> ";
            echo "     <tr> <td> Kolor </td> <td> Popularność </td> </tr> ";
            foreach ($this->dane as $dziewczyna => $punkt ){
                echo "  <tr> <td> $dziewczyna </td> <td> $punkt </td> </tr> ";
                }

            echo "    </table>";
          echo "<br>";
          }


        }

      $plikJSON = new PlikJson;
      $plikJSON -> sprawdz();
      $plikJSON -> odczyt();
      #$plikJSON -> zapisz(2);



    ?>

    <form action="" method="post">
        <input type="radio" name="result"  value="1"/> Blondynki <br />
        <input type="radio" name="result"  value="2"/> Brunetki <br />
        <input type="radio" name="result"  value="3"/> Szatynki <br />
        <input type="radio" name="result"  value="4"/> Rude <br />
        <input type="submit" name="submit" value="Wyslij" />
    </form>


  <?php
      $radio_value=0;
      if(isset($_POST['submit']))
      {
        $radio_value = $_POST["result"];
        #echo $radio_value;
        $plikJSON -> zapisz($radio_value);
        $radio_value = 0;
      }
  ?>

  <hr>



  <!-- <p id=wyniki>
    <strong> Wyniki </strong>
      <table>
        <tr> <td> Kolor </td> <td> Popularność </td> </tr>
        <tr> <td> Blondynki </td> <td> <?php echo "s" ; ?> </td> </tr>
        <tr> <td> Brunetki </td> <td> <?php echo $radio_value; ?> </td> </tr>
        <tr> <td> Szatynki </td> <td> <?php echo $radio_value; ?> </td> </tr>
        <tr> <td> Rude </td> <td> <?php echo $radio_value; ?> </td> </tr>

      </table>
<br> -->




    <hr>

    <p>


    </p>

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

  <footer> <p> Stopka   </p> </footer>
</body>
</html>
