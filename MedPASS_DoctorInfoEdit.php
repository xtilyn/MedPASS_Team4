<?php
// Initialize the session
session_start();
include 'db_functions.php';
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: MedPASS_Welcome.php");
  exit;
}

$rows = db_select("SELECT * FROM medical_practitioner WHERE Employee_ID ='".$_SESSION['id']."'");

foreach($rows as $value){
   $eid = $value['Employee_ID'];
   $fname = $value['FName'];
   $lname = $value['LName'];
   $phone = $value['Phone'];
   $email = $value['Email'];
   $address = $value['Address'];
   $pos = $value['Specialization'];
   $pw = $value['PASSWORD'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>MedPASS</title>
  <link rel="stylesheet" href="DoctorFormat.css">
</head>

<body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="logo">
          <h2>Med<span class="highlight">PASS</span></h2>
        </div>
        <div class="menu">
          <ul>
            <li><a href="MedPASS_DoctorHome.php">Home</a></li>
			<li><a href="MedPASS_DoctorInfo.php">Back</a></li>
			<li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <section id="showcase">
      <div class="patientSubPage">
        <h1>Edit Your Practitioner Information</h1>
      </div>
    </section>
  </div>

  <section id"content">
    <div class="container contentSubPage">
      <p>
		Employee ID: <?php echo $_SESSION['id'];?>
		<br>
        
        <form  method="POST" action="editPractitioner.php"> <!DATABASE TODO>
        <label for="password">Password:</label>
		<input type="text" id="password" name="password" placeholder="***Password***">
		<br>
        <label for="fname">First Name:</label>
		<input type="text" id="fname" name="firstname" placeholder="<?php echo $fname;?>">
		<br>
		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lastname" placeholder="<?php echo $lname;?>">
		<br>
		<label for="addre">Address:</label>
		<input type="text" id="addr" name="address" placeholder="<?php echo $address;?>">
		<br>
		<label for="phonum">Phone Number:</label>
		<input type="text" id="phonum" name="phonenumber" placeholder="<?php echo $phone;?>">
		<br>
		<label for="mail">Email:</label>
		<input type="text" id="mail" name="email" placeholder="<?php echo $email;?>">
		<br>
		<label for="specialization">Specialization:</label>
		<input type="text" id="specialization" name="specialization" placeholder="<?php echo $pos;?>">
		<br>
	  <input type="submit" name="submit" value="Submit Edit Info"></a>
      </form>
      </p>

    </div>
  </section>
  
  <footer>
    <p>The MedPASS Organization, Copyright &copy; 2018</p>
  </footer>

</body>

</html>
