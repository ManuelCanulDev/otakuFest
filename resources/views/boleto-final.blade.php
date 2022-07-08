<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<body>

    <div style="page-break-after:always;">
        <div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%">
            <table bgcolor="#FFF" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;"
                width="100%">
                <tbody>
                    <tr>
                        <td width="5px" style="padding: 0;"></td>
                        <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                            <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0;">
                                            <a href="#" style="color: #348eda;" target="_blank">
                                                <img src="https://i.ibb.co/QHSqMgL/Logo-Negro.png" alt="Bootdey.com"
                                                    style="height: 160px; max-width: 100%; width: 157px;" height="160"
                                                    width="157" />
                                            </a>
                                        </td>
                                        <td style="color: #000; font-size: 12px; padding: 0; text-align: right;"
                                            align="right">
                                            <h1>ESTE ES TU BOLETO</h1>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="5px" style="padding: 0;"></td>
                    </tr>

                    <tr>
                        <td width="5px" style="padding: 0;"></td>
                        <img src="images/<?php echo rand(1,3); ?>.png" alt="Shen long" width="450"
                            style="position: absolute; opacity: 0.3;">
                        <td bgcolor="#FFFFFF"
                            style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                            <table width="100%"
                                style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                                <tbody>

                                    <tr align="center">
                                        <td width="100%" style="padding: 20px;">
                                            <strong style="color: #333; font-size: 20px;">NOMBRE: {{ $ticket->nombres }}
                                                {{ $ticket->apellidos }}</strong>

                                        </td>
                                    </tr>

                                    <tr align="center">
                                        <td width="100%" style="padding: 20px;">
                                            <strong style="color: #333; font-size: 20px;">ORDEN DE COMPRA:
                                                {{ $ticket->orden->uid }}</strong>

                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td width="100%" style="padding: 20px;">
                                            <strong style="color: #333; font-size: 20px;">DESCRIPCION: UN BOLETO
                                                {{ $ticket->typeTicket->nombre_ticket }}</strong>

                                        </td>
                                    </tr>
                                    <tr style="height: 100px">
                                        <td width="50%" style="padding: 20px;"><strong
                                                style="color: #333; font-size: 24px;"></strong></td>
                                        <td width="50%" style="padding: 20px;"><strong style="color: black">TOTAL:
                                                {{ $ticket->typeTicket->costo_ticket }} MXN</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="padding: 0;"></td>
                        <td width="5px" style="padding: 0;"></td>
                    </tr>
                    <tr>
                        <td width="5px" style="padding: 0;"></td>
                        <td
                            style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                            <table cellspacing="0"
                                style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                                <tbody>
                                    <tr>
                                        <td valign="top" style="padding: 20px;">
                                            <h3
                                                style="
                                                    border-bottom: 1px solid #000;
                                                    color: #000;
                                                    font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                                    font-size: 18px;
                                                    font-weight: bold;
                                                    line-height: 1.2;
                                                    margin: 0;
                                                    margin-bottom: 15px;
                                                    padding-bottom: 5px;
                                                ">
                                                PRESENTA ESTE QR AL GUARDIA DEL EVENTO
                                                <br>
                                                <br>

                                                <small>PRESENTA UNA IDENTIFICACIÓN OFICIAL</small>
                                            </h3>
                                        </td>
                                        <td><img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{ $ticket->token }}&choe=UTF-8"
                                                alt=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="5px" style="padding: 0;"></td>
                    </tr>

                    <tr style="color: #666; font-size: 12px;">
                        <td width="5px" style="padding: 10px 0;"></td>
                        <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                            <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td width="40%" valign="top" style="padding: 10px 0;">
                                            <h4 style="margin: 0;">Preguntas?</h4>
                                            <p
                                                style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                                Por favor contacte a los organizadores.
                                            </p>
                                        </td>
                                        <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                        <td width="40%" valign="top" style="padding: 10px 0;">
                                            <h1 style="margin: 0;"><span class="il">Mauel Canul</span> Developer
                                            </h1>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="5px" style="padding: 10px 0;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>
