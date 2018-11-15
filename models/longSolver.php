<?php

class LongSolver
{
	
	//accepts a word submission
	//checks which words match from whole list including long search
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
		$chars = array("-", ".", "/", "'");
		$plainSubmission = $submission;
		
		foreach ($chars as $char) {
			
			if (strpos($plainSubmission, $char) !== false) {
			
				$plainSubmission = str_replace($char, "", $plainSubmission);
			
			}
		
		}
		
		foreach($wordsArray as $word) {
			
			$plainWord = $word;
			
			foreach ($chars as $char) {
				
				if (strpos($plainWord, $char) !== false) {
					
					$plainWord = str_replace($char, "", $plainWord);
				
				}
			
			}
			
			$wordLengthDif = strlen($word) - strlen($plainWord);
			
			if (strlen($plainSubmission) == strlen($plainWord) && strlen($plainSubmission) == (strlen($word) - $wordLengthDif)) {
				
				$wordMatched = true;
				$i = 0;
				
				while($i < strlen($plainSubmission)) {
					
					if ($plainSubmission[$i] != "_") {
						
						if ($plainSubmission[$i] == $plainWord[$i]) {
						
							//check rest of letters
						
						} else {
						
							//skip to next word
							$wordMatched = false;
							break;
						
						}
					
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