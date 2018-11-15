<?php

class Solver
{
	
	//accepts a word submission
	//checks which words match from whole lsit
	//returns list of matching words
	
	
		
	public static function solves($submission, $anagramSearch = FALSE) {
	
		if (!file_exists("resources/fullList.txt")) {
			$missingFile = "resources/fullList.txt";
			return call('error', 'file_missing');
		}
		$wordsArray = array();
		$wordList = fopen("resources/fullList.txt", "r") or die("can't open file");
		while (!feof($wordList)) {
			$wordsArray[] = trim(fgets($wordList));
		}
		fclose($wordList);
		
		$list = array();
		foreach($wordsArray as $word) {
			if (strlen($submission) == strlen($word)) {
				$wordMatched = true;
				$i = 0;
				while($i < strlen($submission)) {
					if ($submission[$i] != "_") {
							if ($submission[$i] == $word[$i]) {
								//check rest of letters
							} else {
								//skip to next word
								$wordMatched = false;
								break;
							}
					} else if ($word[$i] == " " || $word[$i] == "'" || $word[$i] == "-" || $word[$i] == "/") {
						$wordMatched = false;
						break;
					}
					$i++;
				}
				if ($wordMatched) {
					array_push($list, $word);
				}
				$wordMatched = false;
			}
		}
		if (empty($list)) {
			return call('error', 'no_match');
		} else {
			return $list;
		}
	}
}