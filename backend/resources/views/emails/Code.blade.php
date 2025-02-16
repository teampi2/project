<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de Confirmação - EduBot</title>
    <style>
        body {
            font-family: 'Libre Franklin', Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .header {
            background-color: #EB6047;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .verification-code {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="../../../public/edubot.png" alt="Logo EduBot">
        </div>
        <div class="content">
            <p>Olá,</p>
            <p>Seu código de verificação é:</p>
            <strong><div class="verification-code">{{$code}}</div></strong>
            <p>Insira esse código para continuar com seu acesso.</p>
            <p>Se você não solicitou esse código, ignore este e-mail.</p>
        </div>
        <div class="footer">
            © 2025 EduBot</br>Todos os direitos reservados.
        </div>
    </div>
</body>
</html>

