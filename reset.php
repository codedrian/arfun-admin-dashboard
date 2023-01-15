<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
      <title>Password Reset</title>
      <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="reset.css">
  </head>
  <body>
      <main>
        <section class="container reset-container">
          <fieldset>
            <div>
              <img src="assets/img/reset.svg" width="50px" height = "50px">
              <!--https://www.visualpharm.com/free-icon-->
            </div>
            <div>
              <label for="mail">Email</label> <br>
              <input type="email" id="mail" name="mail"/>
            </div>
            <button id="resetPassword">Confirm</button>
          </fieldset>
      </section>
      <div class="feedbackContainer success">
        <div class="feedbackIcon"></div>
        <p class="feedbackMessage">Signed up Successfully</p>
      </div>
      <div class="feedbackContainer failure">
        <div class="feedbackIcon"></div>
        <p class="feedbackMessage">Signing up failed</p>
      </div>
    </main> 
    <!-- The core Firebase JS SDK is always required and must be listed first -->
   <script src="firebase/6.2.4/firebase-app.js"></script>
   <script src="firebase/6.2.4/firebase-auth.js"></script>

   <!-- TODO: Add SDKs for Firebase products that you want to use
       https://firebase.google.com/docs/web/setup#reserved-urls -->

   <!-- Initialize Firebase -->
   <script src="firebase/init.js"></script>
    <script src="./js/reset.js"></script>   
  </body>
</html>