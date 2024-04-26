
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculator</title>
    <style>
      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .calculator-container {
            width: 350px;
            margin: 50px auto;
            background-color: #f2f2f2;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            text-align: center;
            width: 100%;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        input[type="number"], select, input[type="submit"] {
            width: 80%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="number"]:focus, select:focus, input[type="submit"]:hover {
            border-color: #4CAF50;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        strong {
            display: block;
            margin-top: 10px;
            font-size: 10px;
            color: #333;
        }
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 20%;
}

td, th {
     

  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

        * {
  box-sizing: border-box;
}

.flex-container {
  display: flex;
  flex-direction: row;
  font-size: 15px;
  text-align: center;
}

.flex-item-left {

  padding: 10px;
  flex: 50%;
}

.flex-item-right {
 
  padding: 10px;
  flex: 50%;
}

/* Responsive layout - makes a one column-layout instead of two-column layout */
@media (max-width: 800px) {
  .flex-container {
    flex-direction: column;
  }
}
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

.pagin

    </style>
</head>
   <ul>
  <li><a href="History">History List</a></li>
  <li><a href="favorite">Favorite List</a></li>
  <li><a href="groupby">Most Used</a></li>
    <li><a href="login">Log Out</a></li>
  <li style="float:right"><a class="active" href="password">Updata Password</a></li>
    <li style="float:right"><a class="active" href="upload_pic">Update Profile</a></li>
  <li style="float:right">
        <img src="<?php echo base_url('assets/upload/img.jpg.jpg');?>" alt="" width="50" height="45">
    </li>
</ul>
<body>
    
<div class="flex-container">
  <div class="flex-item-right">
    <div class="calculator-container">
        <h2>Calculator</h2>
        <form method="post" action="<?php echo base_url('calculate'); ?>">
            <label for="operand1">Operand 1 </label>
            <input type="number" name="operand1" value="<?php echo isset($result) ? $result : ''; ?>" required><br>
            <label for="operand2">Operand 2:</label>
            <input type="number" name="operand2" required><br>
            <label>Select Operator:</label>
            <div>
                <input type="radio" id="Addition" name="operator" value="+">
                <label for="Addition">Addition</label>
                <input type="radio" id="Subtraction" name="operator" value="-">
                <label for="Subtraction">Subtraction</label>
                <input type="radio" id="Multiplication" name="operator" value="*">
                <label for="Multiplication">Multiplication</label>
                <input type="radio" id="Division" name="operator" value="/">
                <label for="Division">Division</label>
                <input type="radio" id="Percentage" name="operator" value="%">
                <label for="Percentage">Percentage</label>
            </div>
            <input type="submit" value="Calculate">
        </form>

        <?php if (isset($result)): ?>
        <strong>Result: <?php echo $result; ?></strong>
        <?php endif; ?>
    </div>
</div>

  </div>
</div>


</div>

</body>
</html>






