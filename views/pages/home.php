<div id="formHolder">

<h2>enter the letters you have in the field(s) below using spaces, hyphens or question marks for unknown letters</h2>

<form autocomplete="off" action="index.php?controller=results&action=submit" method="post">
	
  <div class="row loneRow">
    
    <div class="rowLeft">
      <label for="num_words">number of words: </label>
    </div>
    
    <div class="rowRight">
    	<div id="minusNum" class="symbolSpan"><div><?php include('img/minus.svg'); ?></div></div>
      <div id="numHolder">
      <input type="text" readonly="readonly" name="num_words" id="num_words" value="<?php if (isset($_POST['num_words'])) { echo $_POST['num_words'];} else { echo 1;}; ?>" />
      </div>
      <div id="plusNum" class="symbolSpan"><div><?php include('img/plus.svg'); ?></div></div>
    </div>
    
  </div>
  
  <div id="inputHolder">
  <?php for ($l = 1; $l < 16; $l ++) { ?>
  
		<div class="inputDiv" id="row<?php echo $l; ?>" style="display: <?php if (isset($_POST['num_words']) && $l <= $_POST['num_words']) {echo 'inline-block;';} else if ($l>1) {echo 'none;';} else { echo 'inline-block;';}?>">
  
     	<input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" name="submission<?php echo $l; ?>" id="submission<?php echo $l; ?>" <?php if (isset($_POST['submission' . $l]) && $l <= $_POST['num_words']) { echo ' value="' . $_POST['submission' . $l] . '"';} else { echo 'value=""'; } ?> placeholder="enter word <?php echo $l; ?>" />
		</div>
    
	<?php } ?>
  </div>
  
  <div id="displaysHolder">
  <?php for ($m = 1; $m < 16; $m ++) { ?> 
		<div class="displayHolder" id="displayHolder<?php echo $m; ?>" style="display: <?php if (isset($_POST['num_words']) && $m <= $_POST['num_words']) {echo 'inline-block;';} else if ($m >1) {echo 'none;';} else { echo 'inline-block;';}?>">

			<?php 
      if (isset($_POST['num_words']) && $_POST['num_words'] >= $m) { 
        $word = $_POST['submission' . $m];
        $length = strlen($word); 
        for ($i = 0; $i < $length; $i ++) {
          echo '<div class="letterDiv">';
          echo $word[$i];
          echo '</div>';
        }
      } 
      ?>
  
    </div>
  <?php } ?>
  </div>
  
  <div class="row loneRow" id="longSearchRow">
  	<div class="rowLeft">
    	<label for="long_search">long search: </label>
    </div>
    <div class="rowRight">
    	<div class="checkboxHolder">
    		<input type="checkbox" style="font-family: arial;" id="long_search" name="long_search" value="true"<?php if (isset($_POST['long_search'])) { ?> checked="checked"<?php } ?> />
        <label for="long_search" style="font-family: arial;"></label>
      </div>
    </div>
  </div>
  
  <div class="row loneRow" style="display: none;">
  	<div class="rowLeft">
    	<label for="anagram_search">perform anagram search: </label>
    </div>
    <div class="rowRight">
    	<div class="checkboxHolder">
    		<input type="checkbox" id="anagram_search" name="anagram_search" onchange="toggleView()" value="true"<?php if (isset($_POST['anagram_search'])) { ?> checked="checked"<?php } ?>  />
        <label for="anagram_search"></label>
      </div>
    </div>
  </div>
  
  <div class="row" style="display: none;">
  	<div class="rowLeft">
    	<label for="anagram_value">enter anagram letters: </label>
    </div>
    <div class="rowRight">
    	<input type="text" id="anagram_value" name="anagram_value" autocomplete="off" value="<?php if (isset($_POST['anagram_value'])) { echo $_POST['anagram_value']; };?>" />
    </div>
  </div>
  
  <div class="row" id="submitHolder">
  	<input id="submit" type="submit" value="solve!" />
  </div>
</form>

</div>
<script type="text/javascript">
var numSelector = document.getElementById('num_words');
var minusNum = document.getElementById('minusNum');
var plusNum = document.getElementById('plusNum');

minusNum.addEventListener('click', function(){displayWordFields('-');});
plusNum.addEventListener('click', function(){displayWordFields('+');});
//numSelector.addEventListener('input', displayWordFields);
var rowArray = [];//[document.getElementById('row1').style.display];
var displayArray = [];

for (i = 0; i < 15; i ++) {
	rowArray[i] = document.getElementById('row' + (i+1));
	displayArray[i] = document.getElementById('displayHolder' + (i+1));
}
function displayWordFields(sign) { 
	var numFields = numSelector.value;
	
	if (sign == '+') {
		if (numFields < 15) {
			var newNum = parseInt(numFields) + 1;
			numSelector.value = newNum;
			numSelector.focus();
			for (var j = 1; j<rowArray.length; j++) {
				if (rowArray[j].style.display == 'inline-block') {
					rowArray[j].style.display = 'none';
				};
				if (displayArray[j].style.display == 'inline-block') {
					displayArray[j].style.display = 'none';
				};
			};
			for (var k = 0; k < newNum; k++) {
				if (rowArray[k].style.display == 'none') {
					rowArray[k].style.display = 'inline-block';
				};
				if (displayArray[k].style.display == 'none') {
					displayArray[k].style.display = 'inline-block';
				};
			};
		}
	} else if (sign == '-') {
		if (numFields > 1) {
			var newNum = parseInt(numFields) - 1;
			numSelector.value = newNum;
			numSelector.focus();
			for (var j = 1; j<rowArray.length; j++) {
				if (rowArray[j].style.display == 'inline-block') {
					rowArray[j].style.display = 'none';
				};
				if (displayArray[j].style.display == 'inline-block') {
					displayArray[j].style.display = 'none';
				};
			};
			for (var k = 0; k < newNum; k++) {
				if (rowArray[k].style.display == 'none') {
					rowArray[k].style.display = 'inline-block';
				};
				if (displayArray[k].style.display == 'none') {
					displayArray[k].style.display = 'inline-block';
				};
			};
		}
	}
};

var tableRow = document.getElementById('anagramRow');
var checkBox = document.getElementById('anagram_search');

function toggleView() {
	if (checkBox.checked) {
		tableRow.style.display = 'table-row';
	} else {
		tableRow.style.display = 'none';
	}
};
<?php for ($k = 1; $k < 16; $k ++) { ?>
var input<?php echo $k; ?> = document.getElementById('submission<?php echo $k; ?>');
//var parentDiv = document.getElementById('diplayHolder');
input<?php echo $k; ?>.addEventListener('input', function(){displayInput(<?php echo $k ; ?>);}, false); 

<?php } ?>
function displayInput(num) {
	var inputValue = window['input' + num].value;
	var parentDiv = document.getElementById('displayHolder' + num);
	while (parentDiv.hasChildNodes()) {
		parentDiv.removeChild(parentDiv.lastChild);
	}
	for (i = 0; i < inputValue.length; i++) {
		var div = document.createElement("div");
		div.className = 'letterDiv';
		if (inputValue[i] == "-" || inputValue[i] == "?") {
			div.innerHTML = " ";
		} else {
			div.innerHTML = inputValue[i];
		}
		document.getElementById('displayHolder' + num).appendChild(div);
	}
	
}
</script>
