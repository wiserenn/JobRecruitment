<!DOCTYPE html>
<html>

<head>
    <title>Job Postings</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


    <table>
        <tr>
            <td>
                <button type="button" onclick="redirectToJobSeeker()">Go job seeker main page</button>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Job Postings</h3>
            </td>
        </tr>
        <tr>
            <td>
                    <h2>Job Title 1</h2>
                    <p>Company: Company 1</p>
                    <p>Description: Job description 1</p>
                    <a href="apply.php?id=1">Apply Now</a>
            </td>
        </tr>
          
        <tr>
            <td>
                <h2>Job Title 2</h2>
                <p>Company: Company 2</p>
                <p>Description: Job description 2</p>
                <a href="apply.php?id=2">Apply Now</a>
            </td>
         
        </tr>

        <!-- Add more job postings here -->

    </table>

    <script>
        
        function redirectToJobSeeker() {
            window.location.href = 'jobseeker.php';
        }
    </script>
</body>

</html>