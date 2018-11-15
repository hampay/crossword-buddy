<?php

$defineds = $fullResults[0];
$undefineds = $fullResults[1];

?>

<div id="resultsHolder">

	<?php if (!empty($defineds)) { ?>

		<h3>

			<?php 

				echo count($defineds) . ' defined match';
				if (count($defineds) != 1) { echo 'es' };
				echo ':'; 
			
			?>
		
		</h3>

		<?php $posAbb = array(

			'n' => 'noun',
			'v' => 'verb',
			'a' => 'adjective',
			's' => 'adjective',
			'r' => 'adverb'

		); 

		$o = 0;

		foreach ($defineds as $defined) { 

			$sorteds = array(

				'n'=>array(),
				'v'=>array(),
				'a'=>array(),
				's'=>array(),
				'r'=>array()

			);

		?>

		<ul>
		
			<?php
		
				$o ++;
				foreach ($defined->definitions as $definition) {
				
					array_push($sorteds[$definition[0]], $definition[1]);
				
				}

			?>
			
			<li class="wordsList">
				
				<h4 id="wordHeader<?php echo $o; ?>">

					<span id="arrow<?php echo $o; ?>" class="arrowInactive">
					</span>
					<?php echo $defined->word; ?>

				</h4>
		    	
		    	<ul class="paddingFixInactive" id="definition<?php echo $o; ?>">

		    		<?php foreach ($sorteds as $key=>$sorted) { ?>

		      			<?php if (!empty($sorted)) { ?>

		        			<li class="definitionList">

		        				<span class="pOS">
		        					<?php echo $posAbb[$key]; ?>		
	        					</span>
		          	
		          				<ol class="definitions">

		            				<?php foreach ($sorted as $def) { ?>

		              					<li class="definitionItem">
		              						<?php echo $def; ?>
	              						</li>

		              				<?php } ?>

					            </ol>

				        	</li>
		        		
		        		<?php }?>
		      		
		      		<?php } ?>
		    	
		    	</ul>
		  	
		  	</li> 
		
		</ul>
			
		<?php }	?>

	<?php } ?>

	<?php if (!empty($undefineds)) { ?>

		<h3>

			<?php 

				echo count($undefineds) . ' undefined match';
				if (count($undefineds) != 1) { echo 'es'; }
				echo ':';
			?>

		</h3>
	
		<ul>
	
			<?php foreach ($undefineds as $undefined) { ?>
	
				<li class="unwordsList">
					<a href="http://www.google.com/search?q=<?php echo str_replace(" ", "+", $undefined); ?>+definition" target="_blank">
						<h4>
							<?php echo $undefined; ?>
							<span class="googleSearch">search on google</span>
						</h4>
					</a> 	
				</li>
	
			<?php } ?>
	
		</ul>

	<?php } ?>

</div>

<script>

	<?php for ($l = 1; $l <= $o; $l++) { ?>

		var arrow<?php echo $l; ?> = document.getElementById('wordHeader<?php echo $l; ?>');
		arrow<?php echo $l; ?>.addEventListener('click', function(){displayDef(<?php echo $l; ?>);}, false);

	<?php } ?>

	function displayDef(num) {

		var listSpan = document.getElementById('arrow' + num);
		var listEl = document.getElementById('definition' + num);

		if (listSpan.className == 'arrowInactive') {
			
			listSpan.className = 'arrowActive';
			listEl.className = 'paddingFixActive';
		
		} else {
			
			listSpan.className = 'arrowInactive';
			listEl.className = 'paddingFixInactive';
		
		}
		
		listSpan.style.display = 'inherit';

	}
	
</script>