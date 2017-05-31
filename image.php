<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// controls the spacing between text
$i=30;
//PNG image quality 0-9
$quality = 9;

        //function to convert hex to RGB
        function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') 
        {
            $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
            $rgbArray = array();
            if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
                $colorVal = hexdec($hexStr);
                $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
                $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
                $rgbArray['blue'] = 0xFF & $colorVal;
            } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
                $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
                $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
                $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
            } else {
                return false; //Invalid hex color code
            }
            return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
        }

        //function for creating image
        function create_image($user)
        {
   
                global $quality;
                global $i;
                $file = "covers/".md5($user[0]['name']).".png";   
            

                    // define the base image that we lay our text on                  
                    $im = imagecreatefrompng($user[0]['image']);
                    
                    $transparent = imagecolorallocate($im, 0, 0, 0);

                    // Make the background transparent
                    imagecolortransparent($im, $transparent);

                    

                    // this defines the starting height for the text block
                    $y = imagesy($im) - 0 - 300;
                    echo $y;
                     
                // loop through the array and write the text                   
                foreach ($user as $value)
                {
                    // center the text in our image - returns the x value
                    //$im = imagecreatefrompng($value['image']);
                    $x = center_text($value['name'], $value['font-size'],$value['fontname']);  


                    // setup the text colours
                    $color = hex2RGB($value['color'], true);
                    $RGB = explode(",", $color);
                    $fontfamily = $value['fontname'];

                    imagettftext($im, $value['font-size'], 0, $x, $y+$i, imagecolorallocate($im,$RGB[0],$RGB[1],$RGB[2]), $fontfamily ,$value['name']);


                    // add 32px to the line height for the next text block
                    $i = $i+1; 
                    
                }
                    // create the image
                    imagepng($im, $file, $quality);
                    
            //}
                                
                return $file;   
        }

        function center_text($string, $font_size, $fontname)
        {

                    $image_width = 300;
                    $dimensions = imagettfbbox($font_size, 0, $fontname, $string);
                    
                    return ceil(($image_width - $dimensions[4]) / 2);               
        }
            
        // getting data from index.php    
        $user = array(           
                    array(
                        'name'=> $_POST['printchatbox'], 
                        'font-size'=>'12',
                        'color'=>$_POST['color'],
                        'fontname'=> 'font/Capriola-Regular.ttf',
                        'image'=>"images/".$_POST['image'],

                        ),               
                );                   
            

        // run the script to create the image
        $filename = create_image($user);

?>

<img src="<?=$filename;?>?id=<?=rand(0,1292938);?>" width="300" height="auto"/>