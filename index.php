<html>
	<head>
		<meta charset="utf-8">
		<title>Poker Game</title>
		<!--spades, diamonds, clubs-->
		<style>
		h1 {text-align: center;}
		.baraja 
		{
		    width: 72px;
		    height: 100px;
		    display: block;
		    margin: 10px;
		}
		.left {float: left;}
		.right {float: right;}
		.clear {clear: both;}
		.carta_14hearts {background: url(baraja.png) 0 0;}
		.carta_2hearts {background: url(baraja.png) -72px 0;}
		.carta_3hearts {background: url(baraja.png) -144px 0;}
		.carta_4hearts {background: url(baraja.png) -216px 0;}
		.carta_5hearts {background: url(baraja.png) -288px 0;}
		.carta_6hearts {background: url(baraja.png) -360px 0;}
		.carta_7hearts {background: url(baraja.png) -432px 0;}
		.carta_8hearts {background: url(baraja.png) -504px 0;}
		.carta_9hearts {background: url(baraja.png) -576px 0;}
		.carta_10hearts {background: url(baraja.png) -648px 0;}
		.carta_11hearts {background: url(baraja.png) -720px 0;}
		.carta_12hearts {background: url(baraja.png) -792px 0;}
		.carta_13hearts {background: url(baraja.png) -864px 0;}
		.carta_14diamonds {background: url(baraja.png) 0 -100px;}
		.carta_2diamonds {background: url(baraja.png) -72px -100px;}
		.carta_3diamonds {background: url(baraja.png) -144px -100px;}
		.carta_4diamonds {background: url(baraja.png) -216px -100px;}
		.carta_5diamonds {background: url(baraja.png) -288px -100px;}
		.carta_6diamonds {background: url(baraja.png) -360px -100px;}
		.carta_7diamonds {background: url(baraja.png) -432px -100px;}
		.carta_8diamonds {background: url(baraja.png) -504px -100px;}
		.carta_9diamonds {background: url(baraja.png) -576px -100px;}
		.carta_10diamonds {background: url(baraja.png) -648px -100px;}
		.carta_11diamonds {background: url(baraja.png) -720px -100px;}
		.carta_12diamonds {background: url(baraja.png) -792px -100px;}
		.carta_13diamonds {background: url(baraja.png) -864px -100px;}
		.carta_14clubs {background: url(baraja.png) 0 -200px;}
		.carta_2clubs {background: url(baraja.png) -72px -200px;}
		.carta_3clubs {background: url(baraja.png) -144px -200px;}
		.carta_4clubs {background: url(baraja.png) -216px -200px;}
		.carta_5clubs {background: url(baraja.png) -288px -200px;}
		.carta_6clubs {background: url(baraja.png) -360px -200px;}
		.carta_7clubs {background: url(baraja.png) -432px -200px;}
		.carta_8clubs {background: url(baraja.png) -504px -200px;}
		.carta_9clubs {background: url(baraja.png) -576px -200px;}
		.carta_10clubs {background: url(baraja.png) -648px -200px;}
		.carta_11clubs {background: url(baraja.png) -720px -200px;}
		.carta_12clubs {background: url(baraja.png) -792px -200px;}
		.carta_13clubs {background: url(baraja.png) -864px -200px;}

		.carta_14spades {background: url(baraja.png) 0 -300px;}
		.carta_2spades {background: url(baraja.png) -72px -300px;}
		.carta_3spades {background: url(baraja.png) -144px -300px;}
		.carta_4spades {background: url(baraja.png) -216px -300px;}
		.carta_5spades {background: url(baraja.png) -288px -300px;}
		.carta_6spades {background: url(baraja.png) -360px -300px;}
		.carta_7spades {background: url(baraja.png) -432px -300px;}
		.carta_8spades {background: url(baraja.png) -504px -300px;}
		.carta_9spades {background: url(baraja.png) -576px -300px;}
		.carta_10spades {background: url(baraja.png) -648px -300px;}
		.carta_11spades {background: url(baraja.png) -720px -300px;}
		.carta_12spades {background: url(baraja.png) -792px -300px;}
		.carta_13spades {background: url(baraja.png) -864px -300px;}

		.oculto {display: none;}
		table, td, th {border: 1px solid #000000;}
		</style>
	</head>
	<body>
	<div>
		By Luis Miguel Bravo<br />
		<a href="http://bravoluismiguel.com.ve/" >http://bravoluismiguel.com.ve/</a>
	</div>
	<div style="text-align: center; margin: 20px;">
		<button style=" margin: 0 auto; " type="button" onclick="javascript:location.reload();">Play Again!</button>
	</div>
	
		<?php 
			$url = 'http://dealer.internal.comparaonline.com:8080/deck';
			$data = array('key1' => 'value1', 'key2' => 'value2');


			// use key 'http' even if you send the request to https://...
			$options = array(
			    'http' => array(
			        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($data)
			    )
			);
			$context  = stream_context_create($options);
			$token1 = @file_get_contents($url, false, $context);
			while ( $token1 === FALSE) 
			{
				$token1 = @file_get_contents($url, false, $context);
			}
			{
				//var_dump($result);
				echo "<div class='oculto'> <label>Token 1 : </label> ". $token1. "</div>";
				//bien, ahora pido una mano de cartas a ver que tal
				//http://dealer.internal.comparaonline.com:8080/deck/30fb0370-75c6-11e6-9c4b-b5d17f2932f5/deal/5
				$mano1 = @file_get_contents("http://dealer.internal.comparaonline.com:8080/deck/". $token1 . "/deal/5");

				
				if ($mano1 === FALSE) 
				{
					//echo "Hubo error al pedir la mano 1";
					echo '<meta http-equiv="refresh" content="1">';
				}
				else
				{
					echo "<div  class='oculto'> <label>Hand 1 : </label> ". $mano1 . "</div>";
					// bien, ahora pido el token2
					$token2 = @file_get_contents($url, false, $context);
					while ( $token2  === FALSE) 
					{
						$token2 = @file_get_contents($url, false, $context);
					}
					{
						//var_dump($result);
						echo "<div  class='oculto'> <label>Token 1 : </label> ". $token2. "</div>";
						//bien, ahora pido una mano de cartas a ver que tal
						//http://dealer.internal.comparaonline.com:8080/deck/30fb0370-75c6-11e6-9c4b-b5d17f2932f5/deal/5
						$mano2 = @file_get_contents("http://dealer.internal.comparaonline.com:8080/deck/". $token2 . "/deal/5");
						if ($mano2 === FALSE) 
						{
							//echo "Hubo error al pedir la mano 2";
							echo '<meta http-equiv="refresh" content="1">';
						}
						else
						{
							// bien, ahora pido el token2				
							echo "<div  class='oculto'> <label>Hand 2 : </label> ". $mano2 . "</div>";
						}
					}
					//aqui tengo las dos manos de cartas
					//$mano1 
					//$mano2 

					//Convierto las manos en array

					$array_mano1 = json_decode($mano1, TRUE);
					$array_mano2 = json_decode($mano2, TRUE);

					sustituir_jqka($array_mano1);
					sustituir_jqka($array_mano2);
					
					sksort($array_mano1, "number");
					sksort($array_mano2, "number");
					// muestro las manos    
					echo "<div style='background-color: #CCCCCC;width: 520px;margin: 0 auto;'><label>Hand 1 </label>";
						mostrar_mano($array_mano1);
					echo "</div>";
					
					echo "<div style='background-color: #DDDDDD;width: 520px;margin: 0 auto;'><label>Hand 2 </label>";
						mostrar_mano($array_mano2);
					echo "</div>";

					$ranking_mano1 = array( Royal_Flush($array_mano1),
										Straight_Flush($array_mano1),
										Four_of_a_Kind($array_mano1),
										Full_House($array_mano1),
										Flush($array_mano1),
										Straight($array_mano1),
										Three_of_a_Kind($array_mano1),
										Two_Pairs($array_mano1),
										One_Pair($array_mano1),
										High_Card($array_mano1, 0),
										High_Card($array_mano1, 1),
										High_Card($array_mano1, 2),
										High_Card($array_mano1, 3),
										High_Card($array_mano1, 4)
										);
					$ranking_mano2 = array( Royal_Flush($array_mano2),
										Straight_Flush($array_mano2),
										Four_of_a_Kind($array_mano2),
										Full_House($array_mano2),
										Flush($array_mano2),
										Straight($array_mano2),
										Three_of_a_Kind($array_mano2),
										Two_Pairs($array_mano2),
										One_Pair($array_mano2),
										High_Card($array_mano2, 0),
										High_Card($array_mano2, 1),
										High_Card($array_mano2, 2),
										High_Card($array_mano2, 3),
										High_Card($array_mano2, 4)
										);
					Looking_for_a_Champion($ranking_mano1, $ranking_mano2);

					echo 	"<table style='margin: 20px auto;'>
								<tr>
									<td>
										
									</td>
									<td>
										Player 1
									</td>
									<td>
										Player 2
									</td>
								</tr>
								<tr>
									<td>
										Royal Flush
									</td>
									<td>
										". Royal_Flush($array_mano1) . "
									</td>
									<td>
										". Royal_Flush($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Straight Flush
									</td>
									<td>
										". Straight_Flush($array_mano1) . "
									</td>
									<td>
										". Straight_Flush($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Four of a Kind
									</td>
									<td>
										". Four_of_a_Kind($array_mano1) . "
									</td>
									<td>
										". Four_of_a_Kind($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Full House
									</td>
									<td>
										". Full_House($array_mano1) . "
									</td>
									<td>
										". Full_House($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Flush
									</td>
									<td>
										". Flush($array_mano1) . "
									</td>
									<td>
										". Flush($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Straight
									</td>
									<td>
										". Straight($array_mano1) . "
									</td>
									<td>
										". Straight($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Three of a Kind
									</td>
									<td>
										". Three_of_a_Kind($array_mano1) . "
									</td>
									<td>
										". Three_of_a_Kind($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Two Pairs
									</td>
									<td>
										". Two_Pairs($array_mano1) . "
									</td>
									<td>
										". Two_Pairs($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										One Pair
									</td>
									<td>
										". One_Pair($array_mano1) . "
									</td>
									<td>
										". One_Pair($array_mano2) . "
									</td>
								</tr>
								<tr>
									<td>
										Firts High Card
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano1, 0)) . "
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano2, 0)) . "
									</td>
								</tr>
								<tr>
									<td>
										Second High Card
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano1, 1)) . "
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano2, 1)) . "
									</td>
								</tr>
								<tr>
									<td>
										Third High Card
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano1, 2)) . "
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano2, 2)) . "
									</td>
								</tr>
								<tr>
									<td>
										Fourth High Card
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano1, 3)) . "
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano2, 3)) . "
									</td>
								</tr>
								<tr>
									<td>
										Fifth High Card
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano1, 4)) . "
									</td>
									<td>
										". Mostrar_letra(High_Card($array_mano2, 4)) . "
									</td>
								</tr>
							</table>";

				}
			}



			function sustituir_jqka(&$array)
			{
				$i = 0;
				while ($i < 5) {
					if ($array[$i]["number"] == 'J')
					{
						$array[$i]["number"] = 11;
					}
					if ($array[$i]["number"] == 'Q')
					{
						$array[$i]["number"] = 12;
					}
					if ($array[$i]["number"] == 'K')
					{
						$array[$i]["number"] = 13;
					}
					if ($array[$i]["number"] == 'A')
					{
						$array[$i]["number"] = 14;
					}
					$i++;
				}
			}

			function mostrar_mano($mano_mostrar_mano)
			{
				$i = 0;
				while ($i < 5) {
					//<div class="baraja carta_Aspades left"></div>
					echo '<div class="baraja carta_' . $mano_mostrar_mano[$i]["number"] . $mano_mostrar_mano[$i]["suit"] . ' left"></div>';
					$i++;
				}
				echo '<div class="clear"></div>';
			}

			function sksort(&$array, $subkey="id", $sort_ascending=true) {

			    if (count($array))
			        $temp_array[key($array)] = array_shift($array);

			    foreach($array as $key => $val){
			        $offset = 0;
			        $found = false;
			        foreach($temp_array as $tmp_key => $tmp_val)
			        {
			            if(!$found and strtolower($val[$subkey]) > strtolower($tmp_val[$subkey]))
			            {
			                $temp_array = array_merge(    (array)array_slice($temp_array,0,$offset),
			                                            array($key => $val),
			                                            array_slice($temp_array,$offset)
			                                          );
			                $found = true;
			            }
			            $offset++;
			        }
			        if(!$found) $temp_array = array_merge($temp_array, array($key => $val));
			    }

			    if ($sort_ascending) $array = array_reverse($temp_array);

			    else $array = $temp_array;
			}

			function Royal_Flush($mano_royal_flush)
			{
				//10,11,12,13,14 del mismo traje
				if (mismo_traje($mano_royal_flush) ==  true)//tienen el mismo traje
				{
					$mano_royal_flush_i = 0;
					$mano_royal_flush_suma = 0;
					while ($mano_royal_flush_i < 5) 
					{
						$mano_royal_flush_suma = $mano_royal_flush_suma + $mano_royal_flush[$mano_royal_flush_i]["number"];
						$mano_royal_flush_i++;
					}
					if ($mano_royal_flush_suma == 60)
					{
						return true;	
					}
				}
				return false;
			}

			function mismo_traje($mano_mismo_traje)
			{ // las 5 cartas del mismo traje
				$i = 0;
				$mismo_traje_traje;
				while ($i < 5) 
				{
					if ($i == 0)
					{
						$mismo_traje_traje = $mano_mismo_traje[$i]["suit"];
					}
					else
					{
						if ($mano_mismo_traje[$i]["suit"]  !=  $mismo_traje_traje)
						{
							return false;
						}
					}
					$i++;
				}
				return true;
			}

			function Straight($mano_straight_flush)
			{
				// All cards are consecutive values of same suit.
				//delta de varacion debe ser uno para todos los casos
				$delta = 0;
				$straight_i = 1;
				while ($straight_i < 5) 
				{
					//$delta = $mano_straight_flush[$straight_i]["number"] - $mano_straight_flush[$straight_i-1]["number"] ;
					//echo "<div> Delta : " . $delta . "</div>";
					if ($mano_straight_flush[$straight_i]["number"] - $mano_straight_flush[$straight_i-1]["number"] > 1) 
					{
						return false;
					}
					$straight_i++;
				}
				return true;
			}

			function Straight_Flush($mano_straight_flush)
			{
				// All cards are consecutive values of same suit.
				//delta de varacion debe ser uno para todos los casos
				if (mismo_traje($mano_straight_flush) ==  true)//tienen el mismo traje
				{
					$straight_flush_i = 1;
					while ($straight_flush_i < 5) 
					{
						if ($mano_straight_flush[$straight_flush_i]["number"] - $mano_straight_flush[$straight_flush_i-1]["number"] > 1) 
						{
							return false;
						}
						$straight_flush_i++;
					}
					return true;
				}
				return false;
			}

			function Four_of_a_Kind($mano_straight_flush)
			{
				// Four cards of the same value
				// i, i, i, i, D
				// D, i, i, i, i

				if ($mano_straight_flush[0]["number"] == $mano_straight_flush[1]["number"])
				{
					if ($mano_straight_flush[1]["number"] == $mano_straight_flush[2]["number"])	
					{
						if ($mano_straight_flush[2]["number"] == $mano_straight_flush[3]["number"])	
						{
							return true;
						}
					}
				}

				if ($mano_straight_flush[1]["number"] == $mano_straight_flush[2]["number"])
				{
					if ($mano_straight_flush[2]["number"] == $mano_straight_flush[3]["number"])	
					{
						if ($mano_straight_flush[3]["number"] == $mano_straight_flush[4]["number"])	
						{
							return true;
						}
					}
				}
				return false;
			}

			function Full_House($full_house_mano)
			{
				//Three of a kind and a pair
				// Three Three Three pair pair
				// pair pair Three Three Three
				if ($full_house_mano[0]["number"] == $full_house_mano[1]["number"])
				{
					if ($full_house_mano[1]["number"] == $full_house_mano[2]["number"])	
					{
						if ($full_house_mano[3]["number"] == $full_house_mano[4]["number"])	
						{
							return true;
						}
					}
				}
				if ($full_house_mano[0]["number"] == $full_house_mano[1]["number"])
				{
					if ($full_house_mano[2]["number"] == $full_house_mano[3]["number"])	
					{
						if ($full_house_mano[3]["number"] == $full_house_mano[4]["number"])	
						{
							return true;
						}
					}
				}
				return false;
			}

			function Three_of_a_Kind($Three_of_a_Kind_mano)
			{
				//Three cards of the same value
				// i,	i,	i, 	n, 	p
				// n,	i,	i,	i, 	p
				// n,	p,	i,	i,	i
				if ($Three_of_a_Kind_mano[0]["number"] == $Three_of_a_Kind_mano[1]["number"])
				{
					if ($Three_of_a_Kind_mano[1]["number"] == $Three_of_a_Kind_mano[2]["number"])	
					{
						return true;
					}
				}
				if ($Three_of_a_Kind_mano[1]["number"] == $Three_of_a_Kind_mano[2]["number"])
				{
					if ($Three_of_a_Kind_mano[2]["number"] == $Three_of_a_Kind_mano[3]["number"])	
					{
						return true;
					}
				}
				if ($Three_of_a_Kind_mano[2]["number"] == $Three_of_a_Kind_mano[3]["number"])
				{
					if ($Three_of_a_Kind_mano[3]["number"] == $Three_of_a_Kind_mano[4]["number"])	
					{
						return true;
					}
				}
				return false;
			}

			function Two_Pairs($two_Pairs_mano)
			{
				if (Four_of_a_Kind($two_Pairs_mano) == false)
				{
					//	i,	i,	*,	j,	j
					//	i,	i,	j,	j, 	*
					//	*,	i,	i,	j,	j
					if ($two_Pairs_mano[0]["number"] == $two_Pairs_mano[1]["number"])
					{
						if ($two_Pairs_mano[2]["number"] == $two_Pairs_mano[3]["number"])	
						{
							return true;
						}
						if ($two_Pairs_mano[3]["number"] == $two_Pairs_mano[4]["number"])	
						{
							return true;
						}
					}
					if ($two_Pairs_mano[1]["number"] == $two_Pairs_mano[2]["number"])
					{
						if ($two_Pairs_mano[3]["number"] == $two_Pairs_mano[4]["number"])
						{
							return true;
						}
					}
				}
			}

			function One_Pair($one_pair_mano)
			{
				if (Four_of_a_Kind($one_pair_mano) == false)
				{
					if (Two_Pairs($one_pair_mano) == false)
					{
						//	i,	i,	n,	p,	h
						//	h,	i,	i,	n,	p,
						//	p,	h,	i,	i,	n,	
						//	n,	p,	h,	i,	i,
						if ($one_pair_mano[0]["number"] == $one_pair_mano[1]["number"])
						{
							return true;
						}
						if ($one_pair_mano[1]["number"] == $one_pair_mano[2]["number"])
						{
							return true;
						}
						if ($one_pair_mano[2]["number"] == $one_pair_mano[3]["number"])
						{
							return true;
						}
						if ($one_pair_mano[3]["number"] == $one_pair_mano[4]["number"])
						{
							return true;
						}
					}
				}
				return false;
			}

			function High_Card($high_card_hand, $position) //first hight card, second higt card
			{
				return $high_card_hand[4 - $position]["number"];
			}

			function Looking_for_a_Champion($ch_1, $ch_2)
			{
				$ch_i = 0;
				
				while ($ch_i < 9) 
				{
					if ($ch_1[$ch_i] == true && $ch_2[$ch_i] == false)
					{
						echo "<h1> HAND 1 WIN</h1>";
						return 0;
					}
					if ($ch_1[$ch_i] == false && $ch_2[$ch_i] == true)
					{
						echo "<h1> HAND 2 WIN</h1>";
						return 0;
					}
					$ch_i++;
				}	

				while ($ch_i < 14) 
				{
					if ($ch_1[$ch_i] > $ch_2[$ch_i])
					{
						echo "<h1> HAND 1 WIN</h1>";
						return 0;
					}
					if ($ch_1[$ch_i] < $ch_2[$ch_i])
					{
						echo "<h1> HAND 2 WIN</h1>";
						return 0;
					}
					$ch_i++;
				}
				echo "<div> It's a tie</div>";
			}
			function Mostrar_letra($Mostrar_letra_letra)
			{
				if ($Mostrar_letra_letra == 11) return 'J';
				if ($Mostrar_letra_letra == 12) return 'Q';
				if ($Mostrar_letra_letra == 13) return 'K';
				if ($Mostrar_letra_letra == 14) return 'A';
				return $Mostrar_letra_letra;
			}

		?>		
	<div style="text-align: center; margin: 20px;">
		<button style=" margin: 0 auto; " type="button" onclick="javascript:location.reload();">Play Again!</button>
	</div>
	<div style="text-align: right;">
		By Luis Miguel Bravo<br />
		<a href="http://bravoluismiguel.com.ve/" >http://bravoluismiguel.com.ve/</a>
	</div>
	</body>
	<!-- 
		if (ranking (mano1) == manking(mano2))
		{
			Comparar carta mayor.
		}
	-->
</html>


