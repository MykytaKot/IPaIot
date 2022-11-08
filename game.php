<?


$filename = "player".$_GET["p"].".txt";
if($_GET["a"] == 0){
    
    
   
    $str = file_get_contents($filename);
    echo($str);
}else{
    
    $put = $_GET["x"].",".$_GET["y"].",".$_GET["f"].",".$_GET["q"];
    file_put_contents($filename,$put);
    
}

?>
