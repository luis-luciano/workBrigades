<!DOCTYPE html>
<html>
    <head>
        <title>403</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'futura';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                height: 100vh;
                width: 100vw;
                background: url(../assets/globals/img/resources/body.png) no-repeat center top;
                background-size: cover;
                overflow: hidden;      
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }




img{
    height: 310px;
    width: 420px;
    margin: 15px 0;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
}
 
img:hover {
    height: 360px;
    width: 470px;
    margin-left: -50px;
    margin-right: -100px;
}

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img  src="{{ asset('../assets/globals/img/resources/denegado.png') }}" width="300px" height="300px" style="opacity:0.7;">
            </div>
        </div>
    </body>
</html>
