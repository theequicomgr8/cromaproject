
<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://document.cromacampus.com/public/images/favicon.svg" type="image/ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://document.cromacampus.com/public/css/bootstrap.min.css">
    <!-- Style -->
       <link rel="stylesheet" href="https://document.cromacampus.com/public/css/style11.css">
    <link rel="stylesheet" href="https://document.cromacampus.com/public/css/responsive.css">
    <link rel="stylesheet" href="https://document.cromacampus.com/public/css/select2.min.css">
    <link rel="stylesheet" href="https://document.cromacampus.com/public/css/dataTables.min3.css">
    <link rel="stylesheet" href="https://document.cromacampus.com/public/css/buttons.dataTables.min1.css">

    <title>Document Upload Login Application</title>
  </head>
  <body>
         
    <section class="document-login-section">
      <div class="document-box-area">
        <div class="login-right-image">

        </div>
        <div class="loginform text-center">
            <form method="post" action="{{Route('auth')}}"> <!-- companylist.html -->
              @csrf             
              <img src="https://document.cromacampus.com/public/images/document/logindpimage.png" alt="logindpimage" class="mb-3 img-fluid">
                <h2>Welcome Please Login!</h2>
                <div class="form-login mt-4">
                  <input type="text" name="email" class="my-control" id="exampleFormControlInput1" placeholder="Email Address">
                  <img src="https://document.cromacampus.com/public/images/document/usericon.svg" alt="usericon">
  
                </div>
                <div class="form-login">
                  <input type="password" name="password" class="my-control" id="exampleFormControlInput1" placeholder="Password">
                  <img src="https://document.cromacampus.com/public/images/document/passwordicon.svg" alt="passwordicon">
  
                </div>
                
                <!--<div class="text-start form-login">-->
                <!--  <input type="checkbox" id="remember" name="remember">-->
                <!--  <label for="remember">Remember Me</label>-->
                <!--</div>  -->
       
                <input type="submit" class="btn btn-green mb-1" style="padding:10px 15px 12px;font-size:16px;" value="Login">
            </form>
         </div>
      </div>
    </section>
    
        
          
  
<script src="https://document.cromacampus.com/public/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://document.cromacampus.com/public/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://document.cromacampus.com/public/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://document.cromacampus.com/public/js/custom2.js"></script>

    

  </body>
</html>