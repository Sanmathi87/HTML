<!DOCTYPE html>
<html>
<body>
  <h2>Welcome to SunMoon!</h2>
  <p>Freshly brewed coffee, cozy vibes, and warm smiles waiting for you.
  Whether you need a quick morning espresso or a relaxed evening with friends,
  Brew Haven is the perfect spot to unwind.</p>

  <img src="coffee.jpg" width="350"><br><br>

  <h3>Why Choose Us?</h3>
  <ul>
    <li>100% fresh roasted coffee beans</li>
    <li>Cozy and comfortable seating</li>
    <li>Free Wi-Fi for all customers</li>
    <li>Friendly and quick service</li>
  </ul>

  <h3 id="clock"></h3>

  <script>
    function showTime() {
      document.getElementById("clock").innerHTML = "Current Time: " + new Date().toLocaleTimeString();
    }
    setInterval(showTime, 1000);
    showTime();
  </script>
</body>
</html>
