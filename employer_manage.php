<!DOCTYPE html>
<html>

<head>
    <title>Manage Job Postings</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    

    <table>
        <tr>
            <td colspan="5"><button style ="margin-top:0px ;" type="button" onclick="redirectToEmployer()">Main page</button></td>
        </tr>
        <tr>
            <th colspan="5"><h3>Manage Job Postings</h3></th>
        </tr>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            <td>Job Title 1</td>
            <td>Company 1</td>
            <td>Job description 1</td>
            <td><a href="edit-posting.html?id=1">Edit</a></td>
            <td><a href="delete-posting.php?id=1">Delete</a></td>
        </tr>
        <tr>
            <td>Job Title 2</td>
            <td>Company 2</td>
            <td>Job description 2</td>
            <td><a href="edit-posting.html?id=2">Edit</a></td>
            <td><a href="delete-posting.php?id=2">Delete</a></td>
        </tr>

    </table>

        <script>
            function redirectToEmployer() {
                window.location.href = 'employer.php';
            }
        </script>
</body>

</html>