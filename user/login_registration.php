<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        legend {
            width: auto;
            color: green;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="btn-group btn-group-lg">
                                    <button type="button" class="btn btn-primary" id="loginBtn" onclick="login()">Login</button>
                                    <button type=" button" class="btn btn-primary" id="regBtn" onclick="register()">Registation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mx-2 d-flex justify-content-center">
                            <div class="col-8" id="login">
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>Login</strong>
                                    </legend>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </fieldset>
                            </div>

                            <div class="col-10" id="register">
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>Registration</strong>
                                    </legend>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone no" name="phoneNo">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select id="gender" class="form-control">
                                                <option selected disabled value="">Select Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>

                                        <div>
                                            <p></p>
                                            <label for="whichYear">Which Year</label>
                                            <div class="form-check form-check-inline ml-3" id="whichYear">
                                                <input class="form-check-input" type="radio" name="wh_year" id="first" value="1">
                                                <label class="form-check-label" for="first">1st Year</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="wh_year" id="second" value="2">
                                                <label class="form-check-label" for="second">2nd Year</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="wh_year" id="third" value="2">
                                                <label class="form-check-label" for="third">3rd Year</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <select multiple class="form-control" id="subject" name="subject">
                                                <option>PHP</option>
                                                <option>NumPy</option>
                                                <option>Anaconda</option>
                                                <option>NoteJs</option>
                                                <option>Java</option>
                                                <option>C++</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="StreamHonours">Stream/honours</label>
                                            <select name="StreamHonours" id="StreamHonours" class="form-control">
                                                <optgroup>
                                                    <option disabled selected value="">Select Stream / honours</option>
                                                </optgroup>
                                                <optgroup label="BSC">
                                                    <option value="volvo">Computer Science</option>
                                                    <option value="saab">Micro Biology</option>
                                                    <option value="saab">Physics</option>
                                                </optgroup>
                                                <optgroup label="BA">
                                                    <option value="mercedes">History</option>
                                                    <option value="audi">Political Science</option>
                                                    <option value="audi">Bengali</option>
                                                    <option value="audi">Geography</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <label for="hobbyHading" class="mt-2">Hobbies</label>
                                        <div class="form-check" id="hobbyHading">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="1">Football
                                            </label>
                                        </div>
                                        <div class=" form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="2">Cricket
                                            </label>
                                        </div>
                                        <div class=" form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="3">Story Book
                                            </label>
                                        </div>
                                        <div class=" form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="4">Swimming
                                            </label>
                                        </div>
                                        <div class=" form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="5">Badminton
                                            </label>
                                        </div>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                        <div class=" form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="conformPassword">Conform Password</label>
                                            <input type="password" class="form-control" id="conformPassword" placeholder="Password" name="conformPassword">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <p>Student Online Registation And Login</p>
                    </div>
                </div>
            </div>
        </div>












    </div>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script>
        var logForm = document.getElementById("login");
        var regForm = document.getElementById("register");

        regForm.style.display = "none";
        document.getElementById("loginBtn").disabled = true;

        function login() {
            regForm.style.display = "none";
            logForm.style.display = "inline";
            document.getElementById("loginBtn").disabled = true;
            document.getElementById("regBtn").disabled = false;
        }

        function register() {
            logForm.style.display = "none";
            regForm.style.display = "inline";
            document.getElementById("regBtn").disabled = true;
            document.getElementById("loginBtn").disabled = false;
        }
    </script>
</body>

</html>