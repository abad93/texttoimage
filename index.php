
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
            <img id="image-background" src="images/tag.png" alt=" " width="300px" height="300px" />
            <input type="hidden" name="image" id="image" value="images/tag.png">
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

        <?php 
            $dirname = "images/";
            $images = glob($dirname."*.png");

            foreach($images as $image) {
         ?>
             <a href="javascript:void(0)" onclick="showImg('<?php echo $image; ?>');"><img id="imagesource" src=" <?php echo $image; ?>" width="50px" height="50px" /></a>
        <?php 
            }
         ?>
            
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
        <input name="submit" type="submit" class="btn btn-primary" value="Make Image" />

    </form>



<script>

var c = document.getElementById("color"),
    res = document.getElementById("printchatbox"),
    inputBox = document.getElementById('chatinput'); //change color
    c.addEventListener("input", function() {
        res.style.color = c.value;
    }, false); 


inputBox.onkeyup = function(){                    //add message
    document.getElementById('printchatbox').innerHTML = inputBox.value;
}


function showImg($image) {          //add image background
    document.getElementById("image-background").src = $image;
    $("input[id=image]").val($image);
}


$('select').on('change', function(){    //add font style
    $('#printchatbox').css('font-family', $(this).val());
});

</script>




 </body>
</html>