
<!DOCTYPE html>
<html>
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<title>JS Bin</title>

<style type="text/css">
    .printchatbox 
    {border-width:thick 10px;border-style: solid; 
    background-color:#fff;
    line-height: 2;color:#6E6A6B;font-size: 14pt;text-align:left;float: middle;
    border: 3px solid #969293;width:40%;
     height:2em;   
}
</style>




</head>
<body>



<div style="margin-top: 1em">
    <h2>Pick a color</h2>
    <input id="color" type="color" value="" />
</div>

<p id="result">Mahal q</p>

<div style="margin-top: 1em">
    <h2> Typing</h2>
<!-- <div class='printchatbox' id='printchatbox'></div> -->

<textarea readonly name="printchatbox" class='printchatbox' id='printchatbox' placeholder="Message" style="text-align:center;height: 300px;width: 300px; resize: none;border: none;"></textarea>

<!-- <input type='text' name='fname' class='chatinput' id='chatinput'> -->

<textarea name="message" class='chatinput' id='chatinput' rows="4" cols="50" placeholder="Message" style="text-align:center;"></textarea>

</div>


<div style="margin-top: 1em">
    <h2>Add image</h2>
  <input type='file' onchange="readURL(this);" />
    
</div>


<img id="blah" src="#" alt="your image" />













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

// mmm.... is it an Opera bug? the manual input doesn't fire the input event type. (works just like change)


     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



</script>




 </body>
</html>