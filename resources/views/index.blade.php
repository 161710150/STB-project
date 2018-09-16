<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="{{asset ('baru/style.css')}}">
</head>
<body>
	<div class="container">
  <h2>Simple jQuery Calculator</h2>
  <div class="calc">
    <div class="inputVal">
      <textarea class="#input" value="" rows="2" cols="20"></textarea>
    </div>
    <div>
      <button value="7" id="7">7</button>
      <button value="8" id="8">8</button>
      <button value="9" id="9">9</button>
      <button value="+" id="add">+</button>
       <button value="" id="clear">C</button>  
    </div>
    <div>
      <button value="4" id="4">4</button>
      <button value="5" id="5">5</button>
      <button value="6" id="6">6</button>
      <button value="-" id="subtract">-</button>
      <button value="" id="backspace">&#x2190</button>
<!--      Need to figure out how to do exp. using math.power(a,b) <button value="^" id="power">x^y</button> -->
    </div>
    <div>
      <button value="1" id="1">1</button>
      <button value="2" id="2">2</button>
      <button value="3" id="3">3</button>
      <button value="*" id="multiply">x</button>
      <button value="(" id="para1">(</button>
    </div>
    <div>
      <button value="." id="dot">.</button>
      <button value="0" id="0">0</button> 
      <button value="=" id="equal">=</button>
      <button value="/" id="divide">/</button>
      <button value=")" id="para1">)</button>
    </div>
  </div>
</div>
	<!-- Script -->
	<script src="{{asset ('baru/jquery.js')}}"></script>
	<script>
  $(document).ready(function(){
  //take html tags with assigned values and set to variable.
  //set textarea to the value of "blank", and add to values.
  
   $('#1,#2,#3,#4,#5,#6,#7,#8,#9,#0,#add, #subtract, #multiply, #divide, #power, #dot, #para1, #para2').click(function(){
    var v = $(this).val();
    var total = $('textarea').val($('textarea').val() + v); 
    });
  
  //clicking equal sign evaluates the textarea
  $('#equal').click(function(){
    $('textarea').val(eval($('textarea').val()));
    });

  
  $('#clear').click(function(){
      $('textarea').val('');
    });
  
    
  $('#backspace').click(function(){
      $('textarea').val($('textarea').val().substring(0, $('textarea').val().length - 1));
    });
});
</script>
</body>
</html>