<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime_record_management";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
$sql = 'SELECT * 
		FROM aressted';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}}
?>
<html>
<head>

	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		link rel="stylesheet" href="css/letestform.css">
		</style>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="css/letestform.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>                 
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body class="inves">
		<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				
				<ul class="nav navbar-nav">
				  <li class="active"><a href="aa.html">Home</a></li>
				  
				
				<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Add record
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="crimerecord.php">Add-CrimeRecord</a></li>
			  <li><a href="victiminfo.php">Add-Victim</a></li>
			  <li><a href="accused.php">Add-Accused</a></li>
			 
			</ul>
		  </li>
				
				 <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show record
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="show_record.php">All crime</a></li>
			  <li><a href="showcriminal.php">All Criminals</a></li>
			  <li><a href="show_accused.php">Accused for a record</a></li>
			 
			</ul>
		  </li>
				  
				
				 <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Update record
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="crime_update.php">Update crime record</a></li>
			  <li><a href="accused_update.php">Update accused record</a></li>
			  
			 
			</ul>
		  </li>
				  
				
				  <li class="active"><a href="chart1.php">Crime Rate</a></li>
				  
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li></li>	
				  <li><a href="#" id="myBtn1"><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>
				</ul>
			  </div>
			</nav>
		<br>
			
	<h1>All criminals</h1>
	<table class="data-table">
		
		<thead>
			<tr>
				<th>Crime Name</th>
				<th> first_name</th>
				<th>last_name</th>
				<th>ID</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
		{
			
			$id=$row['accused_id'];
			
			echo '
				
					<tr>
					
					<td>'.$row['crime_name'].'</td>
					
					 <td > '.$row['first_name'].' </td> 
					<td >'.$row['last_name'].'</td>
                     <td ><a action="POST" href="abc.php?id='.$id.'">'.$row['accused_id'].'</a></td>
					
				</tr>';  // After this on the next page(abc.php) u will retrieve id sent from here as   $id=$_GET['id'];   
			
 		}
		?>
		
		
		<style>
/* The Modal  middle of page(background) */
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close1 {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close1">&times;</span>
    <p>Are You Sure You want to LOGOUT?</p>
	<div class="row">
	     <div class="col-lg-3">
			<button type="submit" class="btn btn-success"><a href="letestloginpage.php">Yes</a></button>
						<button type="submit" class="btn btn-success"><a href="aa.html">NO</a></button>
			 
		 </div>
	</div>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal1');

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
		</tbody>
		
	</table>
</body>
</html>