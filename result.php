<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<!-- Last Page to be Displayed -->

<body id="bground">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Thanks for playing!</h1>
    <p class="lead"><span class="ityped"></span></p>
    <hr>
     <p class="lead" >Have a nice day!</p>
  </div>
</div>

 <!--typed script -->
<script src="includes/js/ityped.js"></script>
  <script>
    window.ityped.init(document.querySelector('.ityped'), {
            strings : ['The results will be anounced soon!', 'We hope you had fun!'],
            loop : true
        });
  </script>

</body>
<style type="text/css">
  .jumbotron {
    text-align: center;
  	color: black;
     background-color: white;
  }
  #bground {
    background: linear-gradient(to right, #83a4d4, #b6fbff);
  }
</style>



<!--  -->