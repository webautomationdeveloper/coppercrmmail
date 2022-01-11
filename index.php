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
$data  = json_decode($response, true);
$contactID=$data['primary_contact_id'];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.copper.com/developer_api/v1/people/'.$contactID,
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
    'x-pw-useremail: amitdeshmukh855@gmail.com',
    'Content-Type: application/json',
    'Cookie: ; uuid=d10167b3-ad91-45ea-a62c-55d4d5ef8084; visited=true'
  ),
));

$people = curl_exec($curl);

curl_close($curl);

// echo $people;



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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body style="display: flex; align-items:center;">
    <div id="root">
    <div id="editor" style="height: 90vh;" name="userQuote" style="display: none;">
        </div>
    </div>
</body>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>

<script> 
        $(document).ready(function(){

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
        if(pipeLineStages[data.pipeline_stage_id] !== "Booked"){
            for (const [key, value] of Object.entries(data)) {
                if(value== null){ missingVal = missingVal + "<p>"+ key +"</p>" }
            }
          if(missingVal.length<0) 
          $("#root").append("<div><h1 style='text-align: center;'>Below fields are missing-</h1><div style='text-align: left;'>"+ missingVal +"</div></div>");
          else {
              createTemplate(data);
            }
        }else console.log("sales stage not booked");
        function createTemplate(data){
            $("#editor").show();
            let textVal = mailTemplate(data);
            const delta = quill.clipboard.convert(textVal);
            quill.setContents(delta, 'silent');
        }

    })
        

function emailHTMLdata(data){
  let people = <?php echo $people; ?>;
  console.log("list of attribute"+ people);


  let emailData ={
    primaryContact: people.name,
    companyName: people.company_name,
    primaryPhone:people.phone_numbers[0].number??"do not exist",
    primaryEmail: people.emails[0].email??"do not exist",
    primaryFirstName:people.first_name,
  }
function timeConverter(time){
  if(time !== null){
  var a = new Date(time * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var dateString  = Utilities.formatDate(a,"AUS", " EE MMM d yyyy HH:mm  ")+"(L)"
  return dateString;
  //return(`${year}/${month}/${date}`);
  }
  else return null;
}


//  here we creating html data In noob way
  for (let i = 0; i < data.custom_fields.length; i++) {
				if (data.custom_fields[i].custom_field_definition_id == 320215) {
							emailData.flt = data.custom_fields[i].value;
						}
        if (data.custom_fields[i].custom_field_definition_id == 398479) {
              emailData.departureAirport = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 418755) {
              emailData.LEG1__Date = timeConverter((data.custom_fields[i].value));
        }

        if (data.custom_fields[i].custom_field_definition_id == 412536) {
              emailData.LEG1__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398508) {
              emailData.LEG1__Destination = data.custom_fields[i].value;
        }


        if (data.custom_fields[i].custom_field_definition_id == 398479) {
              emailData.LEG1__Departure = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427709   ) {
              emailData.LEG2__Date = timeConverter(data.custom_fields[i].value);
        }
        if (data.custom_fields[i].custom_field_definition_id == 427489) {
              emailData.LEG2__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398509) {
              emailData.LEG2__Destination = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 439166) {
              emailData.LEG2__Departure = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427710  ) {
              emailData.LEG3__Date = timeConverter(data.custom_fields[i].value);
        }

         if (data.custom_fields[i].custom_field_definition_id == 427490) {
              emailData.LEG3__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398510) {
              emailData.LEG3__Destination = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 439167) {
              emailData.LEG3__Departure = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427711   ) {
              emailData.LEG4__Date = timeConverter(data.custom_fields[i].value);
        }

        if (data.custom_fields[i].custom_field_definition_id == 427491) {
            emailData.LEG4__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398511) {
              emailData.LEG4__Destination = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 439168) {
              emailData.LEG4__Departure = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427712  ) {
              emailData.LEG5__Date = timeConverter(data.custom_fields[i].value);
        }

        if (data.custom_fields[i].custom_field_definition_id ==  427492 ) {
            emailData.LEG5__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398513) {
              emailData.LEG5__Destination = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427712 ) {
              emailData.LEG5__Departure = data.custom_fields[i].value;
        }


        if (data.custom_fields[i].custom_field_definition_id == 427713  ) {
              emailData.LEG6__Date = timeConverter(data.custom_fields[i].value);
        }

        if (data.custom_fields[i].custom_field_definition_id == 427493) {
            emailData.LEG6__ETD = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398512 ) {
              emailData.LEG6__Destination = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 427713) {
              emailData.LEG6__Departure = data.custom_fields[i].value;
        }
        if (data.custom_fields[i].custom_field_definition_id == 423039) {
              emailData.aircraftType = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398482) {
              emailData.noOfPassenger = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398481) {
              emailData.tripType = data.custom_fields[i].value;
        }

        if (data.custom_fields[i].custom_field_definition_id == 398479) {
              emailData.departure = data.custom_fields[i].value;
        }
		}
  return emailData;
}
function mailTemplate(data){
        let mailData = emailHTMLdata(data);
        console.log(mailData);
        return(` <p>html mail template<p>`)
        }
    </script>

</html>