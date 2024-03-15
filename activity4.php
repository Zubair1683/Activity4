<?php
	if(isset($_POST['inputCurrency'])){
		$inputcurrency = $_POST['inputCurrency'];
    	$outputcurrency = $_POST['outputCurrency'];
    	$inputvalue = $_POST['inputValue'];
	}
    else{
		$inputcurrency = "USD";
    	$outputcurrency = "USD";
    	$inputvalue = 0;
	}
    
    $USD = array("CAD"=>1.35, "EUR"=>0.92);
    $CAD = array("USD"=>0.74, "EUR"=>0.68);
    $EUR = array("CAD"=>1.47, "USD"=>1.09);
    
    if ($inputcurrency == "USD" && $outputcurrency == "CAD") {
        $inputrate = $USD["CAD"];
    } elseif ($inputcurrency == "USD" && $outputcurrency == "EUR") {
        $inputrate = $USD["EUR"];
    } elseif ($inputcurrency == "CAD" && $outputcurrency == "USD") {
        $inputrate = $CAD["USD"];
    } elseif ($inputcurrency == "CAD" && $outputcurrency == "EUR") {
        $inputrate = $CAD["EUR"];
    } elseif ($inputcurrency == "EUR" && $outputcurrency == "CAD") {
        $inputrate = $EUR["CAD"];
    } elseif ($inputcurrency == "EUR" && $outputcurrency == "USD") {
        $inputrate = $EUR["USD"];
    } else {
        $inputrate = 1;
    }
    
    $outputvalue = isset($inputvalue) && isset($inputrate) && ($inputvalue >= 0) &&  is_numeric($inputvalue) ? $inputvalue * $inputrate : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 1" />
</head>
<body>

    <form method="POST">
        <table>
            <tr>
                <td>
                    From:
                </td>
                <td>
                    <input type="text" name="inputValue" value="<?php echo isset($inputvalue) ? $inputvalue : '' ?>"/>
                </td>
                <td>
                    Currency:
                </td>
                <td>
                    <select name="inputCurrency">
                        <option value="USD" <?php if($inputcurrency == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if($inputcurrency == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if($inputcurrency == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>   
            </tr>
            <tr>
                <td>
                    To:
                </td>
                <td>
                    <input type="text" name="outputValue" value="<?php echo $outputvalue; ?>"/>
                </td>
                <td>
                    Currency:
                </td>
                <td>
                    <select name="outputCurrency">
                        <option value="USD" <?php if($outputcurrency == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if($outputcurrency == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if($outputcurrency == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>   
            </tr>
                <tr>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="convert"/>
                </td>   
            </tr>
        </table>
        
    </form>


</body>
</html>