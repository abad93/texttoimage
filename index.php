
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<title>TexttoImage</title>

<style type="text/css">
.printchatbox {
    background-color: transparent;
    border: 3px solid #969293;
    color: #6e6a6b;
    font-size: 14pt;
    height: 2em;
    line-height: 2;
    margin: 0;
    position: absolute;
    text-align: left;
    width: 40%;
    z-index: 1;
}
#image-background {
    left: 0;
    position: absolute;
}
#create-image{
    position: relative;
    width: 300px;
    height: 300px;
}
</style>




</head>
<body>

<form action="image.php" method="post" >

<div id="create-image" style="margin-top: 1em">

<textarea readonly name="printchatbox" class='printchatbox' id='printchatbox' placeholder="Message" style="text-align:center;height: 300px;width: 300px; resize: none;border: none;"></textarea>
<img id="image-background" src="#" alt=" "/>

</div>


<br/>
<textarea name="message" class='chatinput' id='chatinput' rows="4" cols="50" placeholder="Message" style="text-align:center;"></textarea>
<br/>
<div style="margin-top: 1em">
<p>Add text color</p>
    <input name="color" id="color" type="color" value="" />
</div>


<div style="margin-top: 1em">
    <p>Add background image</p>
  <input name="image" type='file' value="twitter.png" onchange="readURL(this);" />
    
</div>


<div style="margin-top: 1em">
    <p>Add font</p>
<select name="font">
<option value="arial">arial black</option>
<option value="tahoma">Tahoma</option>
<option value="times new roman">times new roman</option>

</select>
    
</div>
<br/>
<input name="submit" type="submit" class="btn btn-primary" value="Update Image" />

</form>















<script>

var c = document.getElementById("color"),
    res = document.getElementById("printchatbox"),
    inputBox = document.getElementById('chatinput'); //typing

c.addEventListener("input", function() {
    res.style.color = c.value;
}, false); 


inputBox.onkeyup = function(){                    //typing
    document.getElementById('printchatbox').innerHTML = inputBox.value;
}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image-background')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


$('select').on('change', function(){
    $('#printchatbox').css('font-family', $(this).val());
});

</script>




 </body>
</html>