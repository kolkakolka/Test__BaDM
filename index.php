<?php
session_start();

		$host = '127.0.0.1';
		$db = 'testbadm';
		$user = 'root';
		$pass = '';

class Shop
{
    function getInfo()
    {
       
    }
}

class ShopView
{
    function getInfo()
    {
        
    }
}

class TV
{
    public $manufacturer, $diagonal, $price;
     
    function getInfo()
    {
        echo "Производитель: $this->manufacturer; Диагональ: $this->diagonal; Цена: $this->price <br>";
    }
}

class Monitor
{
    public $manufacturer, $diagonal, $exit_type, $price;
     
    function getInfo()
    {
        echo "Производитель: $this->manufacturer; Диагональ: $this->diagonal; Тип выхода: $this->exit_type; Цена: $this->price <br>";
    }
}

class Keybord
{
    public $manufacturer, $number_of_keys, $connector_type, $price;
     
    function getInfo()
    {
        echo "Производитель: $this->manufacturer; Количество клавиш: $this->number_of_keys; Тип подключения: $this->connector_type; Цена: $this->price <br>";
    }
}

		$tv = new TV;
		try {
			 $dbh = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
			 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			 $sql = "use $db";
			 $dbh->query($sql);
			 $sql = "SELECT * FROM tv";
			 
			 foreach ($dbh->query($sql) as $row) {		
				 $id_tv[] = $row ['id'];		
				 $tv->manufacturer[] = $row ['manufacturer'];
				 $tv->diagonal[] = $row ['diagonal'];
				 $tv->price[] = $row ['price'];
			}
		
		} catch (PDOException $ex) {
			echo "<p style='color: red'>" . $ex->getMessage() . "</p>";
			echo "<pre>";
			print_r($ex->getTrace());
			echo "</pre>";
		}
	 
			echo "<br>----------------<br>";
			for($i = 0; $i < count($id_tv); $i++) 
				{ 
        
						echo $tv->manufacturer[$i] . " ";
						echo $tv->diagonal[$i] . " ";
						echo $tv->price[$i] . " ";
						echo "<br>";
				}
			echo "<br>----------------<br>";

		$mn = new Monitor;
		try {
			 $dbh = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
			 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			 $sql = "use $db";
			 $dbh->query($sql);
			 $sql = "SELECT * FROM monitors";
			 
			 foreach ($dbh->query($sql) as $row) {		
				 $id_mn[] = $row ['id'];		
				 $mn->manufacturer[] = $row ['manufacturer'];
				 $mn->diagonal[] = $row ['diagonal'];
				 $mn->exit_type[] = $row ['exit_type'];
				 $mn->price[] = $row ['price'];
			}
		
		} catch (PDOException $ex) {
			echo "<p style='color: red'>" . $ex->getMessage() . "</p>";
			echo "<pre>";
			print_r($ex->getTrace());
			echo "</pre>";
		}
	 
			echo "<br>----------------<br>";
			for($i = 0; $i < count($id_mn); $i++) 
				{ 
        
						echo $mn->manufacturer[$i] . " ";
						echo $mn->diagonal[$i] . " ";
						echo $mn->exit_type[$i] . " ";
						echo $mn->price[$i] . " ";
						echo "<br>";
				}
			echo "<br>----------------<br>";

		$kb = new Keybord;
		try {
			 $dbh = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
			 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			 $sql = "use $db";
			 $dbh->query($sql);
			 $sql = "SELECT * FROM keybord";
			 
			 foreach ($dbh->query($sql) as $row) {		
				 $id_kb[] = $row ['id'];		
				 $kb->manufacturer[] = $row ['manufacturer'];
				 $kb->number_of_keys[] = $row ['number_of_keys'];
				 $kb->connector_type[] = $row ['connector_type'];
				 $kb->price[] = $row ['price'];
			}
		
		} catch (PDOException $ex) {
			echo "<p style='color: red'>" . $ex->getMessage() . "</p>";
			echo "<pre>";
			print_r($ex->getTrace());
			echo "</pre>";
		}
	 
			echo "<br>----------------<br>";
			for($i = 0; $i < count($id_mn); $i++) 
				{ 
        
						echo $kb->manufacturer[$i] . " ";
						echo $kb->number_of_keys[$i] . " ";
						echo $kb->connector_type[$i] . " ";
						echo $kb->price[$i] . " ";
						echo "<br>";
				}
			echo "<br>----------------<br>";
		
?>
<html>
 <head>
  <meta charset="utf-8">
  <title>тестовое</title>
 </head>
 <body>

 <form method="POST" action="#" >
	  <p><b>Выберете один из списка</b></p>
	  <select required size="4" name="where" >
	  	<option value="1">Все товары с ценой больше заданной</option> 
	  	<option value="2">Все мониторы и телевизоры с заданной диагональю</option> 
	  	<option value="3">Все товары с заданным производителем</option> 
	  	<option value="4">Товары с определенной витрины</option> 
	  </select> 
	  <input type="submit" name="send" value="Просмотреть список"> 
 </form>

	<?php 
      if (isset($_POST['where']))
        { 
	      if ($_POST['where']==1) // 1 Все товары с ценой больше заданной
	        {
	        	?>
					<form method="POST" action="#">
						Задайте цену: <input type=text name="price"><br>
						<input type=submit value="искать">
					</form>
				<?php 
	        }  
	      if ($_POST['where']==2) // 2 Все мониторы и телевизоры с заданной диагональю
	        {
	        	?>
					<form method="POST" action="#">
						Задайте диагональ: <input type=text name="diagonal"><br>
						<input type=submit value="искать">
					</form>
				<?php 
	        }  
	      if ($_POST['where']==3) //3 Все товары с заданным производителем
	        {
	        	?>
					<form method="POST" action="#">
						Выберете производителя: 
						<select required size="6" name="manuf" >
						  	<option value="1">LG</option> 
						  	<option value="2">SAMSUNG</option> 
						  	<option value="3">Bravis</option> 
						  	<option value="4">DELL</option> 
						  	<option value="5">Logitech</option> 
						  	<option value="6">Trust</option> 
						 </select> 
						<input type=submit value="искать">
					</form>
				<?php 
	        }  
	      if ($_POST['where']==4) // 4 Товары с определенной витрины
	        {

	        	?>
					<form method="POST" action="#">
						Выберете витрину: 
						<select required size="3" name="shop_window" >
						  	<option value="1">Телевизор</option> 
						  	<option value="2">Монитор</option> 
						  	<option value="3">Клавиатура</option> 
						 </select> 
						<input type=submit value="искать">
					</form>
				<?php 
	        }  
        }

// 1 Все товары с ценой больше заданной
        if (isset($_POST['price']))
       			{ 
						for($i = 0; $i < count($id_tv); $i++) 
							{
									if ($tv->price[$i] >= $_POST['price']) 
								{
								echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
								}
							}

						for($i = 0; $i < count($id_mn); $i++) 
							{
									if ($mn->price[$i] >= $_POST['price']) 
								{
								echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
								}
							}

						for($i = 0; $i < count($id_kb); $i++) 
							{
									if ($kb->price[$i] >= $_POST['price']) 
								{
								echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
								}
							}
				}  

// 2 Все мониторы и телевизоры с заданной диагональю
        if (isset($_POST['diagonal']))
       			{ 
						for($i = 0; $i < count($id_tv); $i++) 
							{
									if ($tv->diagonal[$i] == $_POST['diagonal']) 
								{
								echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
								}
							}

						for($i = 0; $i < count($id_mn); $i++) 
							{
									if ($mn->diagonal[$i] == $_POST['diagonal']) 
								{
								echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
								}
							}
				}        

// 3 Все товары с заданным производителем
        if (isset($_POST['manuf']))
       			 { 
						if ($_POST['manuf']==1)
						{
							echo "<br> Все LG <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "LG") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "LG") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "LG") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
						if ($_POST['manuf']==2)
						{
							echo "<br> Все SAMSUNG <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "SAMSUNG") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "SAMSUNG") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "SAMSUNG") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
						if ($_POST['manuf']==3)
						{
							echo "<br> Все Bravis <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "Bravis") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "Bravis") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "Bravis") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
						if ($_POST['manuf']==4)
						{
							echo "<br> Все DELL <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "DELL") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "DELL") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "DELL") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
						if ($_POST['manuf']==5)
						{
							echo "<br> Все Logitech <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "Logitech") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "Logitech") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "Logitech") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
						if ($_POST['manuf']==6)
						{
							echo "<br> Все Trust <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
										if ($tv->manufacturer[$i] == "Trust") 
									{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_mn); $i++) 
								{
										if ($mn->manufacturer[$i] == "Trust") 
									{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
									}
								}

							for($i = 0; $i < count($id_kb); $i++) 
								{
										if ($kb->manufacturer[$i] == "Trust") 
									{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
									}
								}
						}
				}

// 4 Товары с определенной витрины
        if (isset($_POST['shop_window']))
       			 { 
						if ($_POST['shop_window']==1)
						{
							echo "<br> Все телевизоры <br>";
							for($i = 0; $i < count($id_tv); $i++) 
								{
									echo 'Телевизор ;' . 'Производитель ' . $tv->manufacturer[$i]. '; Диагональ ' . $tv->diagonal[$i]. '; Цена ' . $tv->price[$i].";<br>";
								}
						}
						if ($_POST['shop_window']==2)
						{
							echo "<br> Все мониторы <br>";
							for($i = 0; $i < count($id_mn); $i++) 
								{
									echo 'Монитор ;' .'Производитель ' . $mn->manufacturer[$i]. '; Диагональ ' . $mn->diagonal[$i]. '; Тип выхода '. $mn->exit_type[$i]. '; Цена ' . $mn->price[$i].";<br>";
								}
						}
						if ($_POST['shop_window']==3)
						{
							echo "<br> Все клавиатуры <br>";
							for($i = 0; $i < count($id_kb); $i++) 
								{
									echo 'Монитор ;' .'Производитель ' . $kb->manufacturer[$i]. '; Диагональ ' . $kb->diagonal[$i]. '; Тип выхода '. $kb->exit_type[$i]. '; Цена ' . $kb->price[$i].";<br>";
								}
						}
				}
 	?>
 </body>
</html>
