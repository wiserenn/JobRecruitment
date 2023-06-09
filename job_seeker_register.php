<?php 

    require_once 'connect_db.php';

    include "security.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    @$gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $birth_date=$_POST['birth_date'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    @$address=$_POST['address'];
    
    $safe_password=password_chain($password);

    $message="You did not choose ";
    if($city==0){
        $cont_city=false;   
        $message=$message."a city ";
       } else $cont_city=true;

    if($district==0){
        $cont_district=false;
        if(!($cont_city))
            $message=$message."and ";
            $message=$message."district";
    } else $cont_district=true;
    
    if($cont_city AND $cont_district){
        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $stmt = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if($row)
        {
            echo "This email is already exist.";
        }
        else
        {
            
            $reg = "INSERT INTO Users (cityID,districtID,name,surname,password,email,phone,address,birth_date,gender)
                            VALUES ($city,$district,'$name','$surname','$safe_password','$email','$phone','$address','$birth_date','$gender')";
            if(sqlsrv_query($conn,$reg)){
                header("Location: job_seeker_login.php");
            }
            else{
                echo "<script type='text/javascript'>
                alert('ERROR');
                </script>";
            }
                
        }
    }else{
        echo "<script type='text/javascript'>
                alert('".$message."');
                </script>";
    }
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Job Seeker Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form action="" method ="POST">
        <button type="button" onclick="redirectToHome()">Go home page</button>
        <h3>Job Seeker Register</h3>

        <div class="name-container">
            <label for="name">Name</label>
            <input type="text" placeholder="Eren" id="name" name="name" required>

            <label for="surname">Surname</label>
            <input type="text" placeholder="Karadeniz" id="surname" name="surname" required>
        </div>

        <label for="">Email</label>
        <input type="email" placeholder="Email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required>


        <div class="gender-container">
            <label for="gender"> Gender : </label>
            <input type="radio" id="gender-male" name="gender" value="Male" required>
            <label for="gender-male">Male</label>
            <input type="radio" id="gender-female" name="gender" value="Female" required>
            <label for="gender-female">Female</label>
        </div>

        <label for="tel">Phone</label>
        <input type="tel" placeholder="Phone" id="phone" name="phone" minlength="10" maxlength="11" required>

        <label for="">Birth Date</label>
        <input type="date" placeholder="00/00/0000" id="birth_date" name="birth_date" required>

        <div class="address-container">
            <label for="city">City</label>
            <select name="city" id="city">
                <option selected="selected" value="0" style="color:black;">Select to City</option>
                <?php include "get_cities.php";?>
            </select>
            

            <label for="district">District</label>
            <select name="district" id="district">
                <option selected="selected" value="0" style="color:black;">Select to District</option>
                
            </select>
        </div>

        <label for="address">Address:</label>
        <input name="address" placeholder="Address" required></input>

        <button>Register</button>


    </form>

    <script>
        function redirectToHome() {
            window.location.href = 'index.php';
        }
    </script>
</body>

</html>

<script>
    var citySelect = document.getElementById("city");
    var districtSelect = document.getElementById("district");

    citySelect.addEventListener("change", function() {
        
        var cityId = citySelect.value;
      
        districtSelect.innerHTML = "";

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_districts.php?cityId=" + cityId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var districts = JSON.parse(xhr.responseText);
                districts.forEach(function(district) {
                    var option = document.createElement("option");
                    option.value = district.districtID;
                    option.text = district.district_name;
                    option.style.color="#000000";
                    districtSelect.appendChild(option);
                });
            }
        };
        xhr.send();
    });    
</script>

