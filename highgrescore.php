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
<!-- To enter GRE , IELTS and CGPA-->
    <form action = "grescore1.php" method="post">


      <table align="center">
        <tr>
          <td> GRE Score: </td>  
          <td> <input class="form-control" type = "text"  name = "gre" id="gre"
                      size = "30" required placeholder="Enter score between 260-340"
                       />
          </td>
        </tr><br><br>
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
   
      </table> 
      <br><br>
        
<!-- The submit and reset buttons -->

      <p align="center">
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear" />
      </p>
    </form>
    </div>

<br>
<div class="display">
<h3 align="center">Based on your GRE and IELTS score</h3><br><br><br>
<!-- If Gre score is greater than 310 display below table-->
<table class="table table-hover" style="width:70%" align="center" border=2>
  <tr align="center">
    <th align="center">List of best Universities for your criteria</th>
  </tr>

<center>
  <tr align="center"><td>University of Texas at Austin</td></tr>
  <tr align="center"><td>Kansas State University</td></tr>
  <tr align="center"><td>University of California- Santa Barbara</td></tr>
  <tr align="center"><td>University of Arizona-Tucson</td></tr>
  <tr align="center"><td>University of Texas – Dallas</td></tr>
    <tr align="center">
  <td>Massachusetts Institute of Technology</td> 
  </tr>
  <tr align="center">
  <td>Stanford University</td> 
  </tr>
  <tr align="center">
  <td>University of California- Berkeley</td>  
  </tr>
  <tr align="center">
  <td>University of Illinois – Urbana Champaign</td> 
  </tr>
  <tr align="center">
  <td>University of Michigan Ann Arbor</td>
  </tr>
  </center>
  </table>
</div>
</body>
</html>