<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Competency Task</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dist/css/index.css" rel="stylesheet">
    
    
  </head>
<body class="text-center">
 
  <main class="form-signin w-100 m-auto">
    <form id="formId" method="post" enctype="multipart/form-data"> 
 
      <img class="mb-2" src="images/logo.png" alt="" width="320" height="150">
      <h1 class="h3 mb-3 fw-normal">Register Your<br>Unique Code</h1>
        <div id="formContentDiv">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="first_name" required>
            <label for="floatingInput">First Name</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="last_name" required>
            <label for="floatingInput">Last Name</label>
          </div>
          <div class="form-floating mb-2">
            <input type="email" class="form-control" name="email" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="code" id="codeId" maxlength=6 minlenght=6 required>
            <label for="floatingInput">Unique Code</label>
          </div>

          <div id="formErrorDiv" class="display-hide">
            <h4 id="resultMsgError"></h4>
          </div>

          <div class="checkbox mb-3">
            <label class="font-info">
              I agree with the terms and conditions 
              <input type="checkbox" name="terms" id="terms" required>
            </label>
          </div>
        
          <button class="w-100 btn btn-lg btn-primary" type="submit">SUBMIT</button>

        </div>
        <div id="formResultDiv" class="display-hide">
          <h4 id="resultMsg"></h4>
        </div>

        <p class="mt-4 mb-3 text-muted">DC &copy; 2022–2022</p>
    
    </form>
  </main>

  <!-- plugins-->
  <script src="assets/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="assets/dist/js/jquery.js" type="text/javascript"></script>
  <script src="assets/dist/js/jquery.validate.js" type="text/javascript"></script>
  <script src="assets/dist/js/jquery.inputmask.js" type="text/javascript"></script>
  <script src="assets/dist/js/index.js" type="text/javascript"></script>

  </body>
</html>
