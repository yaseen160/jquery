<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>jQuery Calculator</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


<div class="calculator">
  <input type="text" id="one">
  <input type="text" id="two">
  +<input type="radio" name="op" value="+">
  -<input type="radio" name="op" value="-">
  *<input type="radio" name="op" value="*">
 /<input type="radio" name="op" value="/">
  %<input type="radio" name="op" value="%">
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
                 case "percentage":
          result = parseInt(firstValue) / parseInt(secondValue);
              break;
            default:
             
          }

    var base = '<?php echo base_url()?>'+'doit';

    $.ajax({
      type: "POST",
      url: base,
      dataType: "json",
      data:{a: firstValue, b: secondValue, c: opp},
      success: function(data){
        $('#result').text(data);
        $('#one').val(data);
        $('#two').val('');
      },
      error: function(a, b, c){
        console.log(a);
        console.log(b);
        console.log(c);
      },
    });
    
  //console.log(result);
  });
 
</script>
</body>
</html>