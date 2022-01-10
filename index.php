<?php
$id= $_GET['ID'];
// echo "hello there";
// echo $id;
$url='https://api.copper.com/developer_api/v1/opportunities/'. $id;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-PW-AccessToken: 9b6ff9a74196d34ed0268fb5bc101845',
    'X-PW-Application: developer_api',
    'X-PW-UserEmail: amitdeshmukh855@gmail.com',
    'Content-Type: application/json',
    'Cookie: ; uuid=06c4e438-6cf5-41e2-9363-49d6b3489ee1; visited=true'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
// echo $response;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <title>Copper CRM Mailsystem </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
    <script>
        $(document).ready(function(){
            tinymce.init({
                selector: '#userText',
                height: 580,
                menubar: false,
            draggable_modal: false,
            statusbar: false,
            object_resizing : false,
            visual: false,
            theme: 'modern',            
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        });
    })
</script>

</head>

<body style="display: flex; align-items:center;">
    <div id="root">
    <textarea id="userText" name="userQuote" style="display: none;" ></textarea>
    </div>
</body>
<script>
        let pipeLineStages ={
            "1510890" :"QI-Estimating & Solution", 
            "2988160" :"Estimate Sent",
            "2929083" : "FIrm Quote Require", 
            "3555634" : "Booked",
            "3551369" : "RFQ",
            "2988159" :"Quote Requested from Operator", 
            "1510892" : "Quote Sent", 
            "25885622" : "Decision",
            "25766734" : "Holding Pattern"
        }
        var missingVal = "";
        let data  = <?php echo ($response); ?>;
        console.log(data);
        if(pipeLineStages[data.pipeline_stage_id] !== "Booked"){
            for (const [key, value] of Object.entries(data)) {
            if(value== null){ missingVal = missingVal + "<p>"+ key +"</p>" }
          }
          if(missingVal.length<0) 
           $("#root").append("<div><h1 style='text-align: center;'>Below fields are missing-</h1><div style='text-align: left;'>"+ missingVal +"</div></div>");
          else {
           createTemplate();
          }
        }else console.log("sales stage not booked");
   

    function createTemplate(){
        $("#userText").show();
        let textVal = `<h1>hello there</h1>`;
        alert("updated");
        tinymce.activeEditor.setContent("<p>Hello world!</p>");
    }
    
    </script>

</html>