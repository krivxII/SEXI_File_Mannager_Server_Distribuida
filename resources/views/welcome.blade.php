<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Drive</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        
    </head>
    <body>
      
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="api/reciviendo_archivo" method="POST" enctype="multipart/form-data">
                <input type="file" class="form-control" name="archivo">
                <input type="text" class="form-control" name="name">
                <input type="submit" class="btn btn-sm btn-block btn-danger" value="upload">

            </form>
        </div>
    </div>
</div>


    </body>
</html>
