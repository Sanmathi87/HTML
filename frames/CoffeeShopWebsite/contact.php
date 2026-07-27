<!DOCTYPE html>
<html>
<body>
  <h2>Contact Us</h2>
  <form onsubmit="return checkForm()">
    Name: <input type="text" id="name"><br><br>
    Email: <input type="text" id="email"><br><br>
    Message:<br>
    <textarea id="msg" rows="3" cols="30"></textarea><br><br>
    <input type="submit" value="Send">
  </form>

  <script>
    function checkForm() {
      var name = document.getElementById("name").value;
      if (name == "") {
        alert("Please enter your name!");
        return false;
      }
      alert("Thank you, " + name + "! We got your message.");
      return false;
    }
  </script>
</body>
</html>