<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>jQuery Calculator</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
  }
  
  .calculator {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .calculator input[type="text"], .calculator input[type="radio"], .calculator button {
    margin: 5px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .calculator button {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .calculator button:hover {
    background-color: #45a049;
  }
  
  .result {
    margin-top: 10px;
    font-size: 18px;
  }
</style>
</head>
<body>


<div class="calculator">
  <input type="text" id="one">
  <input type="text" id="two">
  +<input type="radio" name="op" id="op" value="add">
  -<input type="radio" name="op" id="op" value="minus">
 /<input type="radio" name="op" id="op" value="divide">
 <button type="button" id="calc">Calculate</button>
 <div> Result:<span id="result"></span></div>
<script type="text/javascript">
//   $(document).ready(function(){
// console.log("hello");
//   });
  $('#calc').click(function(){
     var firstValue = $('#one').val();
      var secondValue = $('#two').val();
      var opp = document.querySelector('input[name="op"]:checked').value;
      //console.log(opp);
  
              switch(opp) {
            case "add":
                result = parseInt(firstValue) + parseInt(secondValue);
              break;
            case "minus":
             result = parseInt(firstValue) - parseInt(secondValue);
              break;
         
              case "divide":
          result = parseInt(firstValue) / parseInt(secondValue);
              break;
            default:
              // code block
          }
    
    $('#result').text(result);
  //console.log(result);
  });
 
</script>
</body>
</html>
