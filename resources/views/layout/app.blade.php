<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
      <link rel="stylesheet" href="{{basepath('css/bootstrap.min.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{basepath('css/style.css')}}">
      <link rel="stylesheet" href="{{basepath('css/responsive.css')}}">
      <link rel="stylesheet" href="{{basepath('css/select2.min.css')}}">
      <link rel="stylesheet" href="{{basepath('css/dataTables.min.css')}}">
      <link rel="stylesheet" href="{{basepath('css/buttons.dataTables.min.css')}}">
      
      <title>Assets Management Dashboard</title>
      <!-- only this tab css  -->
   </head>
   <body>
        
        
            @include('layout.header')

            @yield('main')

         



    
            @include('layout.footer')

    
    @yield('script')

</body>
</html>