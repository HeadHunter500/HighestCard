<?php

//$fullDeck = 52;
//$halfDeck = fullDeck/2;

class Player
{
	var $score = 0;
	var $cards = array();	
		
}

$player1 = new Player();
$player2 = new Player();

function deal()
{
	$deck = array();
	
	global $player1, $player2;
		
	for($i = 2; $i < 15; $i++)
	{
		for($j = 0; $j < 4; $j++){
			array_push($deck, $i);
		}
	}
	
	shuffle($deck);
	
	$x = 26;
	for($i = 0; $i < 26; $i++)
	{
		array_push($player1->cards, $deck[$i]);
		array_push($player2->cards, $deck[$x]);
		$x++;
	}
		
}


function turn()
{
	global $player1, $player2;
	
	$p1 = array_pop($player1->cards);
	$p2 = array_pop($player2->cards);
	echo "Player1 draws ".$p1."<br>";
	
	echo "Player2 draws ".$p2."<br>";
	
	if($p1 > $p2)
	{
		$player1->score += 2;
		echo "Player1 wins.<br><br>";
	}
	
	else if($p1 < $p2)
	{
		$player2->score += 2;
		echo "Player2 wins.<br><br>";
	}
	
	else echo "Both players have the same value card.<br><br>";
	
}


function game()
{
	global $player1, $player2;
	
	deal();
	
	while(  !empty($player1->cards) and !empty($player1->cards)  )
	{
		turn();
	}
	
	echo "Player1 has ".$player1->score." points<br>";
	echo "Player2 has ".$player2->score." points<br>";
	
	if($player1->score > $player2->score)
	{
		echo "Player1 wins.";
	}
	
	else if($player1->score < $player2->score)
	{
		echo "Player2 wins.";
	}
	
	else echo "Tie -- no winner.";
	
}



game();

?>