<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TechZone - Advertisement</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f0f4ff;
    }

    /* Header */
    .header {
      background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
      color: white;
      text-align: center;
      padding: 20px;
    }

    .header h1 {
      font-size: 36px;
      letter-spacing: 3px;
      color: #00d4ff;
      text-shadow: 0 0 15px #00d4ff88;
    }

    .header p {
      font-size: 14px;
      color: #aac4ff;
      margin-top: 5px;
      letter-spacing: 2px;
    }

    hr.divider {
      border: none;
      border-top: 2px solid #00d4ff44;
      margin: 10px auto;
      width: 60%;
    }

    /* Tagline */
    .tagline {
      text-align: center;
      background: #fff8e1;
      padding: 12px;
      font-size: 18px;
      font-weight: bold;
      color: #333;
      border-top: 3px solid #ffc107;
      border-bottom: 3px solid #ffc107;
    }

    .tagline span {
      color: #e65100;
      background: #fff3cd;
      padding: 2px 10px;
      border-radius: 4px;
    }

    /* Main content layout */
    .main {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      padding: 30px 60px;
      flex-wrap: wrap;
    }

    /* CSS Computer Illustration */
    .illustration {
      text-align: center;
      flex: 0 0 220px;
    }

    .laptop {
      position: relative;
      width: 180px;
      margin: 0 auto;
    }

    .laptop-screen {
      width: 180px;
      height: 120px;
      background: linear-gradient(135deg, #1a1a2e, #0f3460);
      border: 4px solid #555;
      border-radius: 8px 8px 0 0;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 6px;
    }

    .screen-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #00d4ff;
      box-shadow: 0 0 6px #00d4ff;
      animation: blink 1.5s infinite;
    }

    .screen-dot:nth-child(2) { animation-delay: 0.5s; background: #ffc107; box-shadow: 0 0 6px #ffc107; }
    .screen-dot:nth-child(3) { animation-delay: 1s; background: #ff4757; box-shadow: 0 0 6px #ff4757; }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.3; }
    }

    .screen-text {
      color: #00d4ff;
      font-size: 10px;
      font-family: monospace;
      letter-spacing: 1px;
    }

    .laptop-base {
      width: 200px;
      height: 12px;
      background: linear-gradient(to bottom, #888, #555);
      border-radius: 0 0 4px 4px;
      margin-left: -10px;
    }

    .laptop-stand {
      width: 80px;
      height: 8px;
      background: #666;
      margin: 0 auto;
      border-radius: 0 0 6px 6px;
    }

    .wifi-icon {
      margin-top: 14px;
      font-size: 28px;
    }

    .illustration p {
      margin-top: 8px;
      font-size: 11px;
      color: #666;
      font-style: italic;
    }

    /* Services list */
    .services {
      flex: 1;
      min-width: 260px;
    }

    .services h2 {
      font-size: 18px;
      color: #0f3460;
      margin-bottom: 14px;
      border-left: 4px solid #00d4ff;
      padding-left: 10px;
    }

    .services ul {
      list-style: none;
    }

    .services ul li {
      padding: 8px 0 8px 10px;
      border-bottom: 1px dashed #ccc;
      font-size: 15px;
      color: #333;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .services ul li::before {
      content: "✔";
      color: #00c853;
      font-weight: bold;
      font-size: 13px;
    }

    /* Highlights box */
    .highlights {
      flex: 0 0 180px;
      background: linear-gradient(135deg, #0f3460, #1a1a2e);
      color: white;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .highlights h3 {
      font-size: 14px;
      color: #ffc107;
      letter-spacing: 1px;
      margin-bottom: 16px;
      text-transform: uppercase;
    }

    .badge {
      background: #00d4ff22;
      border: 1px solid #00d4ff55;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 13px;
      color: #e0f7ff;
    }

    .badge strong {
      display: block;
      font-size: 20px;
      color: #00d4ff;
    }

    /* Banner */
    .banner {
      text-align: center;
      background: linear-gradient(90deg, #ff6b35, #f7c59f, #ff6b35);
      padding: 12px;
      font-size: 20px;
      font-weight: bold;
      color: #1a1a2e;
      letter-spacing: 1px;
      animation: shimmer 3s infinite;
      background-size: 200%;
    }

    @keyframes shimmer {
      0% { background-position: 0%; }
      50% { background-position: 100%; }
      100% { background-position: 0%; }
    }

    /* Footer */
    .footer {
      background: #1a1a2e;
      color: #aac4ff;
      text-align: center;
      padding: 16px;
      font-size: 13px;
    }

    .footer .address {
      font-size: 12px;
      color: #7a9cc4;
      margin-top: 4px;
    }

    .footer .phone {
      font-size: 18px;
      font-weight: bold;
      color: #00d4ff;
      margin-top: 6px;
      letter-spacing: 2px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <h1>⚡ TECHZONE SOLUTIONS</h1>
    <hr class="divider">
    <p>YOUR TRUSTED TECH PARTNER SINCE 2010</p>
  </div>

  <!-- Tagline -->
  <div class="tagline">
    Expert Tech Support &nbsp;
    <span>"We Fix It Fast — Or It's FREE!"</span>
  </div>

  <!-- Main Section -->
  <div class="main">

    <!-- CSS Laptop Illustration -->
    <div class="illustration">
      <div class="laptop">
        <div class="laptop-screen">
          <div style="display:flex; gap:8px;">
            <div class="screen-dot"></div>
            <div class="screen-dot"></div>
            <div class="screen-dot"></div>
          </div>
          <div class="screen-text">TECHZONE</div>
          <div class="screen-text">● ● ● ● ●</div>
        </div>
        <div class="laptop-base"></div>
        <div class="laptop-stand"></div>
      </div>
      <div class="wifi-icon">📶</div>
      <p>Always Connected,<br>Always Supported</p>
    </div>

    <!-- Services -->
    <div class="services">
      <h2>Our Services</h2>
      <ul>
        <li>Laptop & Desktop Repair</li>
        <li>Virus & Malware Removal</li>
        <li>Data Recovery & Backup</li>
        <li>Software Installation</li>
        <li>WiFi & Network Setup</li>
        <li>Hardware Upgrades (RAM, SSD)</li>
        <li>Free Diagnosis & Estimates</li>
        <li>Buy & Sell Refurbished Laptops</li>
      </ul>
    </div>

    <!-- Highlight Badges -->
    <div class="highlights">
      <h3>⭐ Why Us?</h3>
      <div class="badge"><strong>24/7</strong>Support</div>
      <div class="badge"><strong>FREE</strong>Diagnosis</div>
      <div class="badge"><strong>1 YR</strong>Warranty</div>
      <div class="badge"><strong>500+</strong>Happy Clients</div>
    </div>

  </div>

  <!-- Banner -->
  <div class="banner">
    🚀 Fastest Repairs in Town — Walk In, Walk Out Fixed! 🚀
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="address">
      📍 Address: 45, Anna Nagar, Coimbatore – 641001 &nbsp;|&nbsp;
      🌐 www.techzonesolutions.in
    </div>
    <div class="phone">📞 PHONE: 98765-43210</div>
  </div>

</body>
</html>