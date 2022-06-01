<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura de compra</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins',sans-serif;
        }
        .container{
            padding: 2rem 15rem;
        }
        .messages{
            background: #dde6e5e3;
            padding: 2rem;
        }
        .messages__header{
            text-align: center;
            color: #0f53e7;
            font-size: 1.2rem;
        }
        .messages__content{
            text-align: center
        }
        .messages__content h1{
            font-size: 24px;
            background-color: #0f53e7;
            margin-bottom: 1.5rem;
        }
        .messages__button{
            padding: 10px 24px;
            outline: none;
            font-size: 16px;
            background: #0f53e7;
            border-radius: 5px;
            text-decoration: none;
            color: #f1f1f1;
        }
        .messages__content p{
            color: #0f53e7;
            font-size: 1.1rem;
            margin: 15px 0px
        }
        .messages__footer{
            text-align: center;
            color: #7a7c80;
            font-size: 14px;
        }
        @media screen and (max-width: 760px){
            .container{
                padding: 1rem ;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="messages">
            <div class="messages__header">
                <img src="https://res.cloudinary.com/ddfsqcy12/image/upload/v1654012560/icons/logo_xmrw5z.svg" width="80" alt="">
                <h3>Hola, {{ $email }} !!</h3>
            </div>
            <div class="messages__content">
                <h1>Usa este link para restablecer tu contraseña</h1>
                <a class="messages__button" href="{{ route('password.edit') }}">Restablecer</a>
                <p>Sino eres tú, inicia sesión para verificar tu cuenta</p>
            </div>
            <div class="messages__footer">
                <p>Has recibido este correo electrónico de alerta de restablecimiento de contraseña. Si deseas agregar o cambiar tu correo comunicate con el administrador de la página, inicia sesión en tu cuenta de hive-vpn</p>
            </div>
        </div>
    </div>

</body>
</html>