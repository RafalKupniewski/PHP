<?php
session_start(); // obowiązkowo na samym początku strony
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['test']))
{
    $session['option_test'] = $_POST['test'];
}

  $pdo = new PDO('sqlite:wyjazdy.db');
  // Set errormode to exceptions
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql1	= 'SELECT * from pracownik;';
  $sql2	= 'SELECT * from auto;';
  $sql3	= 'SELECT * from cel;';

  $lista = $pdo->query($sql1);

  foreach($lista as $elem)
  {
    echo $elem['pracownik_id'], $elem['imie'], $elem['nazwisko'];
  }

  $lista->closeCursor();


  $lista1 = $pdo->query($sql1);
  $lista2 = $pdo->query($sql2);
  $lista3 = $pdo->query($sql3);
echo ' <br> <br>
<form name="form" action="test.php" method="post">
<select name="wybor">';
  foreach($lista1 as $elem1)
  {
    echo '<option value='.$elem1['pracownik_id']. '> ' .$elem1['imie'].' '.$elem1['nazwisko']. ' </option>';
  }
  $lista1->closeCursor();
  //echo '<option selected="selected" >'.$radio_value.'</option>' ;
echo '
</select>

<select name="wybor2">';
  foreach($lista2 as $elem2)
  {
    echo '<option value='.$elem2['auto_id']. '> ' .$elem2['marka'].' '.$elem2['model']. ' </option>';
  }
  $lista2->closeCursor();
  //echo '<option selected="selected" >'.$radio_value.'</option>' ;
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


if(isset($_POST['submit']))
{
  $radio_value = $_POST["wybor"];
  $radio_value2 = $_POST["wybor2"];
  $radio_value3 = $_POST["wybor3"];
  $radio_value4 = $_POST["wybor4"];
  echo $radio_value,$radio_value2,$radio_value3 ;
  echo '<br>';
  echo $radio_value4;
  //$plikJSON -> zapisz($radio_value);
}

?>


<table>
<tr>
<td>Text <span style="float:right;"><i class="fa fa-toggle-on"></i></span></td>
  <td>Test</td>
</tr>
</table>

<form action="test.php" method="post">
  Choose your favorite subject:
  <button name="subject1" type="submit" value="1">HTML</button>
  <button name="subject2" type="submit" value="2">CSS</button>
</form>
<?php
if(isset($_POST['subject1']))
   {
     echo $_POST['subject1'];
     echo "jeden";
   }

if(isset($_POST['subject2']))
  {
     echo $_POST['subject2'];
     echo "dwa";
  }
?>

<!--label for="meeting">Data Wyjadu : </label><input id="wyjazd" type="date" value="<?php #echo date('Y-m-d'); ?>"/>

<!-- input type="date" value="<?php #echo date('Y-m-d'); ?>" />
