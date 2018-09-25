<?php
		
		//Function to evaluate if a text file is ediatable
		function checkIfEditable($fileName) {
			
			//Load data into a PHP variable from the file format file
			$fileFormatData = json_decode(file_get_contents("fileFormats.js"));
			
			//Blow up the filename to get the extension
			$fileName = explode(".",$fileName);
			
			//We do a sizeof here because files sometimes have multiple .s in their name
			$fileFormat = $fileName[sizeof($fileName)-1];
			
			//Go through the format array to see if our fileName string is present
			for($v = 0; $v < sizeof($fileFormatData); $v++) {
				if(in_array($fileFormat,$fileFormatData[$v]->extensions)) { return true; }
			}
			return false;
		}
		
		//Is a text file editable?
		echo "txt file:<br/>";
		if(checkIfEditable("canEdit.txt")) { echo "Editable"; }
		else { echo "Not editable."; }
		
		echo "<br/><br/>";
		
		//Is an exe file editable
		echo "exe file:<br/>";
		if(checkIfEditable("cantEdit.exe")) { echo "Editable"; }
		else { echo "Not editable."; }
		
?>