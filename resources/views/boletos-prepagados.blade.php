<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        *[x-apple-data-detectors],
        /* iOS */
        .x-gmail-data-detectors,
        /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        img.g-img+div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>
    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 480px) {
            .fluid {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }

            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }

            table.center-on-narrow {
                display: inline-block !important;
            }

            .email-container p {
                font-size: 17px !important;
                line-height: 22px !important;
            }
        }
    </style>
</head>

<body width="100%" bgcolor="#F1F1F1" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; background: #F1F1F1; text-align: left;">
        <div
            style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
            (Optional) Find the code... </div>
        <div style="max-width: 680px; margin: auto;" class="email-container">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%"
                style="max-width: 680px;" class="email-container">
                <tr>
                    <td bgcolor="#333333">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 30px 40px 30px 40px; text-align: center;"> <span
                                        style="color:#fff; font-size: 30px">{{ env('APP_NAME') }}</span> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLv0It3FVbIuVZ4clbIAPkrog4wZ-0JiB-og&usqp=CAU" bgcolor="#222222" align="center" valign="top"
                        style="text-align: center; background-position: center center !important; background-size: cover !important;">
                        <div>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"
                                width="100%" style="max-width:500px; margin: auto;">
                                <tr>
                                    <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle">
                                        <table>
                                            <tr>
                                                <td valign="top"
                                                    style="text-align: center; padding: 60px 0 10px 20px;">
                                                    <h1
                                                        style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 30px; line-height: 36px; color: #ffffff; font-weight: bold;">
                                                        LOS BOLETOS SON CASI TUYOS</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top"
                                                    style="text-align: center; padding: 10px 20px 15px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #fff;">
                                                    <p style="margin: 0;">A continuación te presentamos los siguientes
                                                        pasos para realizar el pago de los mismos y asi estar activados
                                                        en la sección "Mis Boletos" de la plataforma.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px 40px 20px 40px; text-align: left;">
                                    <h1
                                        style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 20px; line-height: 26px; color: #333333; font-weight: bold;">
                                        PASO #1 - REALIZA TU PAGO</h1>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Datos para Transferencia:</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:normal;">
                                    <p style="margin: 0;">
                                    <ul>
                                        <li>Número de Tarjeta: 4815 1630 3241 9833</li>
                                        <li>Nombre del Titular: Jafet Ramsell García Morales</li>
                                        <li>Banco: BBVA</li>
                                        <li>Concepto: Tu nombre o {{$orden}}</li>
                                    </ul>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Datos para Deposito:</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:normal;">
                                    <p style="margin: 0;">
                                    <ul>
                                        <li>Número de Tarjeta: 4815 1630 3241 9833</li>
                                        <li>Nombre del Titular: Jafet Ramsell García Morales</li>
                                        <li>Banco: BBVA</li>
                                    </ul>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> <!-- INTRO : END -->
                <!-- CTA : BEGIN -->
                <tr>
                    <td bgcolor="#26a4d3">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px 40px 5px 40px; text-align: center;">
                                    <h1
                                        style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 20px; line-height: 24px; color: #ffffff; font-weight: bold;">
                                        PASO #2 - ESPERA ACTIVEMOS TUS BOLETOS</h1>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 17px; line-height: 23px; color: #aad4ea; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">Mandanos captura de pantalla de la transferencia o foto del
                                        ticket del deposito al siguiente número:</p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="center"
                                    style="text-align: center; padding: 0px 20px 40px 20px;">
                                    <!-- Button : BEGIN -->
                                    <table role="presentation" align="center" cellspacing="0" cellpadding="0"
                                        border="0" class="center-on-narrow">
                                        <tr>
                                            <td style="border-radius: 50px; background: #ffffff; text-align: center;"
                                                class="button-td"> <a
                                                    style="background: #ffffff; border: 15px solid #ffffff; font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 50px; font-weight: bold;"
                                                    class="button-a"> <span style="color:#26a4d3;"
                                                        class="button-link">983 176 6811</span> </a> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 17px; line-height: 23px; color: #aad4ea; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">Y ESPERA NOS COMUNIQUEMOS CONTIGO.</p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="center"
                                    style="text-align: center; padding: 0px 20px 40px 20px;">
                                    <!-- Button : BEGIN -->
                                    <table role="presentation" align="center" cellspacing="0" cellpadding="0"
                                        border="0" class="center-on-narrow">
                                        <tr>
                                            <td style="border-radius: 50px; background: red; text-align: center;"
                                                class="button-td"> <a
                                                    style="background: #red; border: 15px solid red; font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 50px; font-weight: bold;"
                                                    class="button-a"> <span style="color:white;"
                                                        class="button-link">ESTOS SON LOS UNICOS DATOS BANCARIOS
                                                        VALIDOS.</span> </a> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#D3EBCD">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px 40px 20px 40px; text-align: left;">
                                    <h1
                                        style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 20px; line-height: 26px; color: #333333; font-weight: bold;">
                                        PASO #3 - NOS VEMOS EN EL EVENTO</h1>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Nota de Participante:</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:normal;">
                                    <p style="margin: 0;">
                                    El unico medio de pago es el mencionado y el unico lugar para conseguir boletos del evento es en la plataforma <a href="otakufest.xyz">otakufest.xyz</a>
                                    </p>
                                    <p><b>NO CAIGAS EN ESTAFAS.</b></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> <!-- INTRO : END -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <br>
                            <tr>
                                <td align="center"> <img src="https://i.ibb.co/QHSqMgL/Logo-Negro.png" width="37"
                                        height="37" style="display: block; border: 0px;" /> </td>
                            </tr>
                            <tr>
                                <td align="center"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        otakufest.xyz<br></p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 10px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">Cualquier duda o aclaración a boletos@otakufest.xyz</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 40px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">Copyright &copy; 2022 <b>Manuel Canul Developer</b>, Todos
                                        los Derechos Reservados.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>
