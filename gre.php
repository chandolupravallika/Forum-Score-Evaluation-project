<html>
<head>


  <title>GRE Eligibility Criteria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <link rel="stylesheet" type="text/css" href="gre.css">
  


</head>
<body>
<div class="loginpane">
<h1>Your Eligible Universities</h1>
<h3><a href="/forum">SIUC Forum</a><h3>
<!-- To enter GRE , IELTS and CGPA -->
    <form action = "grescore1.php" method="post">
   <!-- grescore1.php-->
  



      <table align="center">
        <tr>
          <td> GRE Score: </td>  
          <td> <input class="form-control" type = "text"  name = "gre" id="gre"
                      size = "30" required placeholder="Enter score between 260-340"
                       />
          </td>
        </tr><br>
        <tr>
          <td> IELTES Score: </td>
          <td> <input class="form-control" type = "text"  name = "IELTES"  
                      id = "IELTS"
                      size = "30" required placeholder="Enter score between 4-9"/>
          </td>
        </tr>

        <tr> 
          <td> cgpa :</td>
          <td> <input class="form-control" type = "text"  name = "cgpa"  
                      id = "cgpa"  size = "30" required placeholder="Enter your CGPA"/>
          </td>
        </tr>
   
      </table> <br>
        
<!-- The submit and reset buttons -->

      <p align="center">
        <input  type = "submit"  value = "submit" />&nbsp;&nbsp;&nbsp;
        <input  type = "reset"  value = "Clear" />
      </p>
    </form>
    </div>

<br><br><br>

</body>
</html>
