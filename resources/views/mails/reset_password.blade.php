<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura de compra</title>
    <style>
        .container{
            background: #f1f1f1;
            padding: 10px 5px;
        }
        h3{
            color: rgb(72, 72, 88);
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        p{
            color: #1b1b1b;
            line-height: 1.5
        }
        .txt-compra{
            font-family: 'Times New Roman', Times, serif;
            font-size: 1.5rem;
            text-align: center;
            display: block;
            color: #738794
        }
        .link{
            font-size: 25px;
            text-align: center;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Hola, {{ $email }} !!</h3>
        <br>
        <span class="txt-compra">Link de restablecimiento: </span>{{ route('password.edit') }}
        <br>
        <p>No compartas este link con nadie.</p>


        <b>Attentamente: @Tecnology Box</b>
        
    </div>

</body>
</html>