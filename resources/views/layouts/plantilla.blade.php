<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Plantilla</title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/estilo.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
       
        <script src=" {{asset('js/bootstrap.js')}}" type="text/javascript"></script>
            
        <script src="https://kit.fontawesome.com/843befe336.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        @include('mensajes')
        <div >
           
            @yield("cabecera")

        </div>
        <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-4 col-md-4  d-none d-lg-block  " >
                    @yield("lateral")
                </div>
                
                 
                <div class="col-lg-7 col-md-7 col-sm-12 col-12  "  >

                    @yield("cuerpo_lateral")

                </div>
            </div>
        </div>
        <div>

            @yield("cuerpo")
        </div>
        <div>
            @yield("pie")

        </div> 

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </body>
</html>





























</html>