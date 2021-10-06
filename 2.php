<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crud Operator</title>
</head>
<body>


	<table>
			
		<tr>
			<td valign="top">

			<fieldset style="width: 400px;">
            <legend>Login</legend>
            <form action="1.html" method="GET">
                <table>
                	
                    <tr>
                        <td>Email/Phone no</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Submit" name="login"></td>
                    </tr>
                </table>
            </form>
    
        </fieldset>
         </td>
			<td>
				
				 <fieldset style="width: 400px;">
            <legend>Registration</legend>
            <form action="1.html" method="GET">
                <table>
                	 <tr>
                        <td>Name</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                     <tr>
                        <td>Phone No</td>
                        <td><input type="text" name="phone_no"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select name="gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top">Hobbies</td>
                        <td><input type="checkbox" name="hobbies[]" value="1">Cricket <br />
                            <input type="checkbox" name="hobbies[]" value="2">Footbal <br />
                            <input type="checkbox" name="hobbies[]" value="3">Story Book<br />
                            <input type="checkbox" name="hobbies[]" value="3">Internet<br />
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Which Year</td>
                        <td><input type="radio" name="wh_year" value="1">1st Year <br />
                            <input type="radio" name="wh_year" value="2">2nd Year <br />
                            <input type="radio" name="wh_year" value="3">3rd Year
                        </td>
                    </tr>
                    <tr>
                        <td>Subjects </td>
                        <td>
                            <select name="abc[]" multiple>
                                <option value="1">PHP</option>
                                <option value="2">NumPy</option>
                                <option value="3">Anaconda</option>
                                <option value="3">NoteJs</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stream/honours</td>
                        <td>
                            <select  name="cars" id="cars">
                                <optgroup label="BSC">
                                  <option value="volvo">Computer Science</option>
                                  <option value="saab">Micro Biology</option>
                                  <option value="saab">Physics</option>
                                </optgroup>
                                <optgroup label="BA">
                                  <option value="mercedes">History</option>
                                  <option value="audi">Political Science</option>
                                  <option value="audi">Bengali</option>
                                </optgroup>
                              </select>
                        </td>
                    </tr>
                     <tr>
                        <td valign="top">Uploads </td>
                        <td><input type="file" name="wh_year">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Submit" name="txtSubmit"></td>
                    </tr>
                </table>
            </form>
    
        </fieldset>

			</td>
		</tr>


	</table>

	
<!--

Tables: 

1. users
==============
name
email
password
gender_id
address
year_id
stream_id
status
created_at
updated_at

user_hobby
===============

id |  user_id | hobby_id
=================================

1   | 1  | 1
2   | 1  | 2
3   | 2  | 3
3   | 2  | 2



user_subject
===============

id |  user_id | subject_id
=================================

1   | 1  | 1
2   | 1  | 2
3   | 2  | 3
3   | 2  | 2


2. genders
=========
id, name, status should enum value Y, N
id | name | status
================
1  | Male  | Y
2  | Female | Y
3  | Trangender | N
2  | abc  | N

select * from gender where status = 'Y'


3. hobbies 

id, name, status should enum value Y, N

id | name | status
================
1  | Footbal  | Y
2  | Cricket | Y
3  | Batmentor | Y
2  | Storybook  | Y



4. years

id, name, status should enum value Y, N

id | name | status
================

5. subjects
id, name, status should enum value Y, N


id | name | status
================


6. streams

id, name, status should enum value Y, N


id | name | parent_id | status
============================

1   | BA   |  0     | Y

2    |  BSC |  0     | Y

3   |  History |  1  | Y

4   |  Political sc  | 1 | Y

5   | Micro Bilogy  | 2 | Y


-->


</body>
</html>