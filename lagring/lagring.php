<?php
    include('../config/session.php');
    include('../include/meny-2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lagersystem - Uke 12</title>
    <!-- Datatables -->
    <link href="../vendor/datatables/datatables.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header mt-3">Lagring</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Lag nytt eske nummer
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 col-xs-1">
                                    <button type="submit" class="btn btn-success" onclick="newBox()">Ny eske</button>
                                </div>
                                <div class="col-md-2 col-sm-2" id="nyEske">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="../vendor/datatables/datatables.min.js"></script>

    <script>
    
    function getBoxIds() {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("boxIDs1").innerHTML = this.responseText;
                document.getElementById("boxIDs2").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET","getboxids.php", true);
        xmlhttp.send();
    }

    function newBox() {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("nyEske").innerHTML = this.responseText;
                getBoxIds();
            }
        };
        xmlhttp.open("GET","createbox.php", true);
        xmlhttp.send();
    }
    </script>
</body>
</html>
