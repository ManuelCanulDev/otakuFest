<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body {
            font-family: 'Roboto Mono', serif;
            padding: 0;
            margin: 0;
        }
        .table-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        table {
            width: calc(100% - 2px);
        }
        /* no need for table rule here */
        th,
        td {
            border: 1px solid black;
        }
        th {
            width: 100px;
        }
        .box {
            width: 50px;
            height: 20px;
            background: blue;
            color: white;
            position: absolute;
            top: 0;
            right: 1px;
        }
    </style>
</head>
<body style="margin-bottom: -2000px;">
    <table>
        <tbody>
            <tr>
                <td align="center">
                    <img width="400" src="images/logo.png" alt="Logo">
                    <br>
                    <h2> {{ "TIPO DE BOLETO: " }} <b>OTAKU NIVEL DIOS</b></h2>
                    <h3> {{ "ORDEN DE COMPRA: 12321321312" }} </h3>
                    <h1> {{ "ASISTENTE: MANUEL JESUS CANUL WITZIL" }} </h1>
                    <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=MAsJuFxrqTRKuyEqqjeWjxj9j1JEbKKGUVRpQx3l03jrcvij76&choe=UTF-8" alt="">
                    <p>HORA: 08:00 AM | FECHA: 04 Y 05 DE AGOSTO DEL 2022 | LUGAR: SINDICATO DE TAXISTAS FRANCISCO MAY</p>
                    <p><h3>TRAER IDENTIFICACION OFICIAL</h3></p>
                </td>
                <td>
                    <img width="300" src="images/promos/1.jpeg" alt="Logo">
                    <img width="300" src="images/promos/2.jpeg" alt="Logo">
                    <img width="300" src="images/promos/3.jpeg" alt="Logo">
                    <img width="300" src="images/promos/4.jpeg" alt="Logo">
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
