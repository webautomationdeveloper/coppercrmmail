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
    'X-PW-AccessToken: d329e57aad8ff703655cad6bfc085e38',
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
    'X-PW-AccessToken: d329e57aad8ff703655cad6bfc085e38',
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
    <title>Copper CRM Mailsystem </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<style>
    #root{
    padding: 10px;
    border: 2px solid red;
    width: 80vw;
    height: 95vh;
    
}
</style>

<body style="display: flex; align-items:center;">
<div id="root" style="height: 90vh; display: none;">
        </div>
    <form id="myForm" method="post" action="mail.php" style="display: none;" enctype="multipart/form-data">
    <div id="editor" style="height: 90vh; width:100%" name="userQuote" ></div>
        <input type="hidden"name="mailContent" id="editorval" style="display: none;">
        <input type="file" name="attachment" id="files" style="width:250px;margin-left:100px;padding-top:30px"  ><br><br>
        <button type="button" id="sendQuote"  style="width:250px;margin-left:100px;background-color:#4285f4;color:white;outline:none;border-radius:10px" onclick="sendEmail()" >Send Mail</button>
    </form>
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
        console.log(data);
        if(pipeLineStages[data.pipeline_stage_id] !== "Booked"){
            for (const [key, value] of Object.entries(data)) {
                if(value== null){ missingVal = missingVal + "<p>"+ key +"</p>" }
            }
          if(missingVal.length<0) {
              $("#root").show();
              $("#root").append("<div><h1 style='text-align: center;'>Below fields are missing-</h1><div style='text-align: left;'>"+ missingVal +"</div></div>");
            }
          else {
              createTemplate(data);
            }
        }else {
            $("#root").show();
              $("#root").append("<div><h1 style='text-align: center;'>Sales Stage not booked-</h1><div style='text-align: left;'>"+ missingVal +"</div></div>");
        }
        function createTemplate(data){
            $("#myForm").show();
            let textVal = mailTemplate(data);
            const delta = quill.clipboard.convert(textVal);
            quill.setContents(delta, 'silent');
        }

    })
        

function emailHTMLdata(data){
  let people = <?php echo $people; ?>;
  console.log(people);


  let emailData ={
    primaryContact: people.name,
    companyName: people.company_name,
    primaryPhone:people.phone_numbers[0].number??"do not exist",
    primaryEmail: people.emails[0].email??"do not exist",
    primaryFirstName:people.first_name,
  }
function timeConverter(time){
  if(time !== null){
//   var a = new Date(time * 1000);
//   var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
//   var year = a.getFullYear();
//   var month = months[a.getMonth()];
//   var date = a.getDate();
// //   var dateString  = Utilities.formatDate(a,"AUS", " EE MMM d yyyy HH:mm  ")+"(L)"
//       //   return dateString;
//   return(`${year}/${month}/${date}`);
return time;
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

function sendEmail(){

   let content =  $("#editor").html();
    console.log(content);
    $("#editorval").val(content);
   document.getElementById("myForm").submit();

}
function mailTemplate(data){
        let mailData = emailHTMLdata(data);
        console.log(mailData);
        return(` 
    <br>
<table style="border-collapse: collapse !important; width: 100%;
background: #f5f5f5;" align="center" cellspacing="0"
cellpadding="0" border="0">
<tbody>
<tr>
<td>
<table style="border-collapse: collapse !important;"
align="center" width="1024" cellspacing="0"
cellpadding="0" border="0">
<tbody>
<tr style="background: #3C87BE; height: 53px; ">
<td> <img
src="https://flightcharter.com.au/images/fc-banner-logo.png">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table style="border-collapse: collapse !important;
background: #fff; border-left: 28px solid #fff;
border-right: 28px solid #fff; font-family: Lucida Sans
Unicode, Tahoma;" align="center" width="1024"
cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr style="vertical-align: top;">
<td style="padding-top: 15px; line-height: 20px;
font-size: 16px; padding-bottom: 20px; width: 50%"><br>
<span style="color: #3C87BE; text-transform:
uppercase; font-weight: bold;">Your Details</span><br>


<label>${mailData.primaryContact}<label><br>
<label>${mailData.companyName}<label><br>
<label>${mailData.primaryEmail}primaryEmail<label><br>
<label>${mailData.primaryContact}<label><br>


</td>
<td style="padding-top: 15px; line-height: 20px;
font-size: 16px; padding-bottom: 20px; width: 50%;
text-align: right; font-weight: bold;"> BOOKING
CONFIRMATION FOR FLT-  RFQ- <label> ${mailData.flt} </label> <br>
&nbsp;&nbsp; </td>
</tr>
<tr>
<td style="padding-bottom: 20px;" colspan="2"> Dear<label>${mailData.primaryFirstName}</label>, <br>

<br>
<p>This is to confirm your charter flight FLT-<label> ${mailData.flt} </label><br>
Please check all details carefully and advise us immediately of any errors or omissions.<br>
Note that all times are local to departure or destination point.<br>
</p>
<br><b><ul>ITINERARY</ul></b><br>

Flight Number: ${mailData.flt}<br>
Aircraft Type: ${mailData.aircraftType}<br>
Number of Passengers:${mailData.noOfPassenger}<br>
<br>Trip Type: ${mailData.tripType}<br>
<br>
${mailData.LEG1__Departure?'Depart :'+mailData.LEG1__Departure +'<br>'+mailData.LEG1__Date+' at '+mailData.LEG1__ETD+'<br>'+'Desination :'+mailData.LEG1__Destination+'<br>' :""}
<br>
${mailData.LEG2__Departure?'Depart :'+mailData.LEG2__Departure +'<br>'+mailData.LEG2__Date+' at '+mailData.LEG2__ETD+'<br>'+'Desination :'+mailData.LEG2__Destination+'<br>' :""}
<br>
${mailData.LEG3__Departure?'Depart :'+mailData.LEG3__Departure +'<br>'+mailData.LEG3__Date+' at '+mailData.LEG3__ETD+'<br>'+'Desination :'+mailData.LEG3__Destination+'<br>' :""}
<br>
${mailData.LEG4__Departure?'Depart :'+mailData.LEG4__Departure +'<br>'+mailData.LEG4__Date+' at '+mailData.LEG4__ETD+'<br>'+'Desination :'+mailData.LEG4__Destination+'<br>' :""}
<br>
${mailData.LEG5__Departure?'Depart :'+mailData.LEG5__Departure +'<br>'+mailData.LEG5__Date+' at '+mailData.LEG5__ETD+'<br>'+'Desination :'+mailData.LEG5__Destination+'<br>' :""}
<br>
${mailData.LEG6__Departure?'Depart :'+mailData.LEG6__Departure +'<br>'+mailData.LEG6__Date+' at '+mailData.LEG6__ETD+'<br>'+'Desination :'+mailData.LEG6__Destination+'<br>' :""}
<br>
 <br>


 <b>COVID-19 SPECIAL NOTE:</b><br>
<u>DOMESTIC (Australia)</u><br>
It is the responsibility of all passengers to ensure that they have the necessary Covid-19 passes, clearances and permissions from all the respective countries, states and territories that they will visit via their itinerary.<br>
<br>
The aircrew will make their own Covid-19 arrangements.<br>
<br>
Please visit the <a href="https://www.healthdirect.gov.au/covid19-restriction-checker/domestic-travel">Australian Health Direct</a> website for more information.<br>
<br>
<u>INTERNATIONAL</u> (In addition to Domestic above)<br>
Please note it is a requirement of most foreign countries for international travellers entering their territory that the traveller has obtained a negative COVID test result within the 72 hours immediately prior to travel.<br>
<br>
<b>Next Steps:</b><br>
<ol>
<li> We will now email you your invoice for {{108983420__output}},  GST Inclusive (or Exempt if applicable)</li>
<li>We will email you specific departure
instructions. <br>
</li>
<li>Please email us with a Passenger Manifest
including;</li>
<ol>
<li>Full names</li>
<li>Individual weights</li>
<li>Number of luggage pieces and total luggage
weight.</li>
</ol>
</ol>
Please note that small and soft sided bags are best.
<br>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table style="border-collapse: collapse !important;
background: #fff; border-left: 28px solid #fff;
border-right: 28px solid #fff; font-family: Lucida Sans
Unicode, Tahoma; margin-top: 20px;" align="center"
width="1024" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr style="font-size: 19px;">
<td>
<p style="padding-top: 20px; padding-bottom:20px;
text-align: center;">If you have any queries
please call or email the team on<br>
<span style="color:#4C81BB;">1300 OUR FLIGHT (687
354)</span>.<br>
<a href="mailto:bookings@flightcharter.com.au">bookings@flightcharter.com.au</a><br>
<br>
We understand that you had choices when choosing who to fly with and we thank you for your business.<br>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="2" style="font-size: 12px; text-align: center;
padding-top: 5px;">
<p>
<br>
All estimates, prices, quotes and invoices sent by
FlightCharter.com.au Pty Ltd are subject to the
FlightCharter Terms &amp; Conditions </p>
</td>
</tr>
</tbody>
</table>        
`)
        }
    </script>

</html>