<!--<script src="jquery.js"></script>-->
<script type="text/javascript"> 
    var isShift = false;
    function keyUP(keyCode) {
        if (keyCode == 16)
            isShift = false;
    }
    function isNumeric(keyCode) {
        if (keyCode == 16)
            isShift = true;

        var res = ((keyCode >= 48 && keyCode <= 57 || keyCode == 8 || keyCode == 110 || (keyCode >= 96 && keyCode <= 105)) && isShift == false);
        var flag = document.getElementById("txtNumeric").value;
       // flag = flag.indexOf('.');
        
        if (!res && (flag.split(".").length - 1)>1)
            document.getElementById("lblNum").style.visibility = "visible";
        else
            document.getElementById("lblNum").style.visibility = "hidden";
        return res;
    }
    function isAlpha(keyCode) {
        if (keyCode == 16)
            isShift = true;
        var res = ((keyCode >= 65 && keyCode <= 90) || keyCode == 8);
        if (!res)
            document.getElementById("lblAlpha").style.visibility = "visible";
        else
            document.getElementById("lblAlpha").style.visibility = "hidden";
        return res;
    }
    function isAlphaSpace(keyCode) {
        
        if (keyCode == 16)
            isShift = true;
        var res = ((keyCode >= 65 && keyCode <= 90) || keyCode == 8 || keyCode==32);
        if (!res)
            document.getElementById("lblAlpha").style.visibility = "visible";
        else
            document.getElementById("lblAlpha").style.visibility = "hidden";
        return res;
    }
    function isAlphaNumeric(keyCode) {
        if (keyCode == 16)
            isShift = true;
        var res = (((keyCode >= 48 && keyCode <= 57) && isShift == false) || (keyCode >= 65 && keyCode <= 90) || keyCode == 8 || (keyCode >= 96 && keyCode <= 105));
        if (!res)
            document.getElementById("lblAlphaNum").style.visibility = "visible";
        else
            document.getElementById("lblAlphaNum").style.visibility = "hidden";
        return res;
    }   

</script>
<table border="0" cellpadding="5" cellspacing="5">
    <tbody>
            <tr>
                    <td>
                            <span style="font-family: arial, sans-serif"><font size="2">Numeric</font></span></td>
                    <td>
                            <input id="txtNumeric" onkeydown="return isNumeric(event.keyCode);" onkeyup="keyUP(event.keyCode)" onpaste="return false;" style="width: 235px" type="text" /></td>
                    <td>
                            <span id="lblNum" style="font-family: arial; visibility: hidden; color: red; font-size: 10pt">* Only Numbers</span></td>
            </tr>
            <tr>
                    <td>
                            <span style="font-family: arial, sans-serif"><font size="2">Alphabetic</font></span></td>
                    <td>
                            <input id="txtAlpha" onkeydown="return isAlpha(event.keyCode);" onkeyup="keyUP(event.keyCode)" onpaste="return false;" style="width: 235px" type="text" /></td>
                    <td>
                            <span id="lblAlpha" style="font-family: arial; visibility: hidden; color: red; font-size: 10pt">* Only Alphabets</span></td>
            </tr>
            <tr>
                    <td>
                            <span style="font-family: arial, sans-serif"><font size="2">Alphabetic With Space</font></span></td>
                    <td>
                            <input id="txtAlpha" onkeydown="return isAlphaSpace(event.keyCode);" onkeyup="keyUP(event.keyCode)" onpaste="return false;" style="width: 235px" type="text" /></td>
                    <td>
                            <span id="lblAlpha" style="font-family: arial; visibility: hidden; color: red; font-size: 10pt">* Only Alphabets</span></td>
            </tr>
            <tr>
                    <td>
                            <span style="font-family: arial, sans-serif"><font size="2">AlphaNumeric</font></span></td>
                    <td>
                            <input id="txtAlphanumeric" onkeydown="return isAlphaNumeric(event.keyCode);" onkeyup="keyUP(event.keyCode)" onpaste="return false;" style="width: 235px" type="text" /></td>
                    <td>
                            <span id="lblAlphaNum" style="font-family: arial; visibility: hidden; color: red; font-size: 10pt">* Only Numbers and Alphabets</span></td>
            </tr>
    </tbody>
</table>