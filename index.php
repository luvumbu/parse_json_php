<!DOCTYPE html>
<html>
<body>

<h2>Use the XMLHttpRequest to get the content of a file.</h2>
<p>The content is written in JSON format, and can easily be converted into a JavaScript object.</p>

<p id="demo"></p>

<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
   console.log(myObj) ; 
  }
};
xmlhttp.open("GET", "c.php", true);
xmlhttp.send();
</script>

 

</body>
</html>
