<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>IPAIOT</title>
</head>
<body>
<div class="flex list" >
<?  
    
    if(isset($_POST['Action'])){
        if($_POST['Action'] == 'Submit'){
            $output = [];

            $output['name'] = $_POST['name'];
            $output['email'] = $_POST['email'];
            $output['gender'] = $_POST['gender'];
            $output['small'] = $_POST['small'];
            $output['keywords'] = $_POST['keywords'];
            $output['response'] = $_POST['response'];
            $filename = $output['email'].'.txt';


            file_put_contents($filename,json_encode($output));
            

            
        }
        if($_POST['Action'] == 'Delete'){
            $filename =$_POST['del'].'.txt';
           
            if(file_exists($filename)){
                unlink($filename);
                
            }


        }
        
    }

?>
           
<div class="block" style="margin-top:20px;">
    <div class="city" style="padding: 5%; ">
        
        <div class="flex" style="justify-content: center;">

            <h2 class="main">Response</h2>


        </div>
        <form  method="post">

       
        <div class="flex" style="justify-content: center;">

            <p class="main">Name : <input class="input_text" id="name" type="text" name="name" placeholder="your name" required></p>
            <p class="main" style="margin-left: 10px;">E-mail : <input class="input_text" id="email" type="email" name="email" placeholder="your e-mail" required></p>
            
        </div>
        <div class="flex" style="justify-content: center;">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" checked id="inlineRadio1" value="male">
        <label class="form-check-label" for="inlineRadio1">male</label>
        </div>
        
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
        <label class="form-check-label" for="inlineRadio2">female</label>
        </div>
        </div>
        <div class="flex" style="justify-content: center;">

            <p class="main">Small description : <input class="input_text" type="text" id ="url" name="small" placeholder="small description" required></p>


        </div>
        <div class="flex" style="justify-content: center;">

            <label for="keywords">Choose keyword:</label>
            <input list="keywordsL" class="input_text" id="keywords" placeholder="Enter keyword" name="keywords" required>

            <datalist id="keywordsL">
                <option value="Bug">
                <option value="Recomendation">
                
            </datalist>


        </div>
        <div class="flex" style="justify-content: center; ">

            <p class="main">Responce : <textarea name="response" id="textarea" style="resize: vertical;" class="input_text" placeholder="your response" cols="50" rows="2" required></textarea></p>

        </div>
        <div class="flex city_main">
            

               <input type="submit" class="input_button" name="Action" value="Submit">  
                
                <input type="reset" class="input_button"  name="Action" value="Reset">

                
            


            


        </div>
        </form>
    </div>

</div>
<?

$files = glob("*.txt");


foreach($files as $file) {
    $content = file_get_contents($file);
    $content = json_decode($content);


    ?>
    
    
        <div class="block" >
        <div class="city" style="padding: 5%; width:50%">
        <div class="flex" style="justify-content: center;">
             <p class="main">Response - <?= $content->name.' / '.$content->email?></p>
        </div>
        <div class="flex" style="justify-content: center;">
             <p class="main">gender - <?= $content->gender.' , keywords -  '.$content->keywords?></p>
        </div>
        <div class="flex" style="justify-content: center;">
             <p class="main"><?= $content->small?></p>
        </div>
                
        <div class="flex" style="justify-content: center;">
             <p class="main"><?= $content->response?></p>
        </div>
       <form action="" method="post">
       <div class="flex" style="justify-content: center;">
             <input type="text" name="del" value="<?=$content->email?>" hidden>
             <input type="submit" class="input_button delete" name="Action" value="Delete">
        </div>

       </form>
        </div>
        </div>
    
    
    <?
}

?>


</div>

</body>
</html>