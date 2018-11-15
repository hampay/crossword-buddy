<?php

class ResultsController
{
	
	//validates $_POST variables
	//prepares submission
	//submits word to solver
	//submits matching words to definer
	//calls relevant view
	
	public function submit() {
		
		if (isset($_POST['long_search']) && $_POST['long_search'] === 'true') {
			$longSearch = TRUE;
		} else {
			$longSearch = FALSE;
		}
		
		if (isset($_POST['anagram_search']) && $_POST['anagram_search'] == 'true') {
			$anagramSearch = TRUE;
			
		} else {
			$anagramSearch = FALSE;
		}
		
		$numWords = $_POST['num_words'];
		$i = 1;
		$submission = '';
		
		while ($i <= $numWords) {
			$word = $_POST['submission' . $i];
			if (strlen($word) > 0) {
				$word = str_replace(" ", "_", $word);
				$word = str_replace("-", "_", $word);
				$word = str_replace("?", "_", $word);
				if ($i > 1) {
					$submission .= " ";
				}
				$submission .= $word;
				$i++;
			} else {
				return call('error', 'submission_length');
			}
		}
		$submission = strtolower($submission);
		if ($longSearch) {
			require_once('models/longSolver.php');
			$results = LongSolver::solves($submission, $anagramSearch);
		} else {
			require_once('models/solver.php');
			$results = Solver::solves($submission, $anagramSearch);
		}
		if (!empty($results)) {
			require_once('models/definer.php');
			$fullResults = Definer::defines($results);
			require_once('views/pages/home.php');
			require_once('views/results.php');
		}
		
	}
	
}