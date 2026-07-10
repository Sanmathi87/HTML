<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: linear-gradient(135deg, #6a3fa0 0%, #9b6fd4 100%);
      padding: 10px 20px;
    }
    .header-left { display: flex; align-items: center; gap: 12px; }
    .logo {
      width: 55px; height: 55px;
      background: #fff;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-weight: bold; font-size: 11px; color: #6a3fa0;
      border: 2px solid #ffd700;
      text-align: center; line-height: 1.2;
      text-decoration: none;
    }
    .header-title { color: #fff; }
    .header-title h2 { margin: 0; font-size: 16px; font-weight: normal; }
    .header-title h1 { margin: 0; font-size: 20px; font-weight: bold; }
    .header-right {
      background: #fff;
      border-radius: 8px;
      padding: 6px 10px;
      display: flex; align-items: center; gap: 6px;
    }
    .kcw-badge {
      font-size: 22px; font-weight: bold; color: #6a3fa0;
      border: 2px solid #6a3fa0; padding: 2px 6px; border-radius: 4px;
      text-decoration: none; display: inline-block;
    }
    .kcw-sub { font-size: 9px; color: #555; text-align: right; line-height: 1.3; }

    .subtitle-bar {
      background: #fff;
      text-align: center;
      padding: 6px;
      font-style: italic;
      color: #444;
      border-bottom: 2px solid #6a3fa0;
      font-size: 14px;
    }

    .content { background: #fff; padding: 20px 30px; min-height: 300px; }
    .content ol { font-size: 15px; line-height: 2; }
    .content a { color: #0645ad; text-decoration: none; }
    .content a:hover { text-decoration: underline; }
    .content img {
      width: 120px; height: auto;
      border: 1px solid #ccc;
      display: block; margin: 6px 0;
    }

    .footer-bar { background: #6a3fa0; height: 8px; }
  </style>
</head>
<body>

  <!-- HEADER -->
  <div class="header">
    <div class="header-left">

      <!-- LINK TYPE 1: IMAGE LINK (logo image links to home) -->
      <a href="index.html" title="Go to Home Page">
        <img src="logo.png" alt="College Logo" width="55" height="55"
             style="border-radius:50%; border:2px solid #ffd700;"
             onerror="this.outerHTML='<span class=\'logo\'>GRG</span>'">
      </a>

      <div class="header-title">
        <h2>PSGR</h2>
        <h1>Krishnammal College for Women</h1>
      </div>
    </div>

    <div class="header-right">
      <!-- LINK TYPE 3: WEBPAGE LINK (opens external college website) -->
      <a href="https://www.psgrkrishnammal.edu.in" target="_blank" class="kcw-badge">KCW</a>
      <div class="kcw-sub">CHAMPIONING WOMEN<br>SINCE 1963</div>
    </div>
  </div>

  <div class="subtitle-bar">(Autonomous College)</div>

  <!-- CONTENT -->
  <div class="content">
    <ol>
      <li>
        Courses Offered
        <ul>
          <!-- LINK TYPE 2: TEXT LINKS -->
          <li><a href="/sanmathi/CollegeWebsite/ug.php">UG</a></li>
          <li><a href="/sanmathi/CollegeWebsite/pg.php">PG</a></li>
        </ul>
      </li>

      <li>Contact Us: T-422 429 5959</li>

      <li>
        Infrastructure
        <br>
        <!-- LINK TYPE 1: IMAGE LINK (clicking image goes to infrastructure page) -->
        <a href="infrastructure.html">
          <img src="college.jpg" alt="College Building"
               onerror="this.src='https://via.placeholder.com/120x80?text=College'">
        </a>
        <br>
        <!-- LINK TYPE 3: WEBPAGE LINK -->
        <a href="https://www.psgrkrishnammal.edu.in" target="_blank">
          Visit Official College Website ↗
        </a>
      </li>
    </ol>
  </div>

  <div class="footer-bar"></div>

</body>
</html>