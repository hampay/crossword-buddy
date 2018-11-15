<?php 

class Definer
{
	
	//accepts an array of words
	//finds definition and part of speech for each
	//returns an array of word objects
	
	public $word;
	public $definitions = array();
	
	public function __construct($word, $definitions) {
		$this->word = $word;
		$this->definitions = $definitions;
	}
	
	public static function defines($words) {
		
		$definedResults = array();
		$undefinedResults = array();
		$wordId;
		
		include('dbconn.php');
		
		//foreach words as word
		foreach ($words as $word) {
			
			//get wordid for word
			$sql = 'SELECT * FROM words WHERE lemma = "' . $word . '"';
			$queryResults = $conn->query($sql);
			
			if ($queryResults->num_rows > 0) {
				while ($row = $queryResults->fetch_assoc()) {
					$wordId = $row['wordid'];
				}
			} else {
				$undefinedResults[] = $word;
				continue;
			} 
			if ($queryResults) { $queryResults->free(); };
			
			//get synset ids for wordid
			$synsetIds = array();
			$sql = "SELECT * FROM senses WHERE wordid = " . $wordId;
			$queryResults = $conn->query($sql);
			if ($queryResults->num_rows > 0) {
				while ($row = $queryResults->fetch_assoc()) {
					$synsetIds[] = $row['synsetid'];
				}
			}
			if ($queryResults) { $queryResults->free(); };
			
			
			$querySeg = "";
			$k = 0;
			$returnArray = array();
			//foreach synset
			foreach($synsetIds as $synsetId) {
				if ($k < 1) {
					$querySeg .= " synsetid = " . $synsetId;
				} else {
					$querySeg .= " OR synsetid = " . $synsetId;
				}
				$k ++ ;
			}
			
			$sql = "SELECT * FROM synsets WHERE " . $querySeg;
			$queryResults = $conn->query($sql);
			$definitions = array();
			if ($queryResults->num_rows > 0) {
				while ($row = $queryResults->fetch_assoc()) {
					$definitions[] = array($row['pos'], $row['definition']);
				}
			}
			if ($queryResults) { $queryResults->free(); };
			$definedResults[] = new Definer($word, $definitions);
				//get definition 
		}
		
		$conn->close();
		$fullResults = array($definedResults, $undefinedResults);
		return $fullResults;
	}
	
}