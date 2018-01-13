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
<h1>Your Eligible Universities</h1><br>
<h3><a href="/forum">SIUC Forum</a><h3>
<br><br>
    <form action = "grescore1.php" method="post">



      <table align="center">
        <tr>
          <td> GRE Score: </td>  
          <td> <input class="form-control" type = "text"  name = "gre" id="gre"
                      size = "30" required placeholder="Enter score between 260-340"
                       />
          </td>
        </tr><br>
        <tr>
          <td> IELTS Score: </td>
          <td> <input class="form-control" type = "text"  name = "IELTES"  
                      id = "IELTES"
                      size = "30" required placeholder="Enter score between 4-9"/>
          </td>
        </tr>

        <tr> 
          <td> cgpa :</td>
          <td> <input class="form-control" type = "text"  name = "cgpa"  
                      id = "cgpa"  size = "30" required placeholder="Enter your CGPA"/>
          </td>
        </tr>
   
      </table> 
        <br>
<!-- The submit and reset buttons -->

      <p align="center">
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear" />
      </p>
    </form>
    </div>

<br><br><br>
<div class="display">
<h3 align="center">Based on your GRE and IELTS score</h3><br><br><br>
<!-- If Gre score is lessthan 290 display below table-->
<table class="table table-hover" style="width:100%" align="center" border=1>
  <tr>
    <th>List of best Universities for your criteria</th>
  </tr>
<center>

  <tr align="center">
   <td>Jacksonville State University</td> 
    </tr>
    <tr align="center">
    <td>Saint Joseph University</td>  
    </tr>
    <tr align="center">
    <td>Chapman University</td>  
    </tr>
    <tr align="center">
    <td>Kent State University</td> 
    </tr>
    <tr align="center">
    <td>Ferris State University</td>
  </tr>
  <tr align="center">
  <td>Temple University, PA</td>
  </tr>
  <tr align="center">
  <td>City College of the City of New York</td> 
  </tr>
  <tr align="center">
  <td>Northeastern Illinois University</td> 
  </tr>
  <tr align="center">
  <td>University of Detroit Mercy</td> 
  </tr>
  <tr align="center">
  <td>University of Arkansas Little Rock</td>
  </tr>

  <tr align="center">
  <td>University of Connecticut</td>
  </tr>
  <tr align="center">
  <td>University of Utah</td>  
  </tr>
  <tr align="center"><td>University of Tennessee-Knoxville</td> 
  </tr>
  <tr align="center">
  <td>West Virginia University</td>  
  </tr>
  <tr align="center">
  <td>University of Kansas</td>
</tr>
  </center>
  </table>
</div>
</body>
</html>