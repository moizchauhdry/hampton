<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=320,initial-scale=1">
    <title>Email</title>
    <style type="text/css">
        .body-wrap,
        .body-wrap-cell,
        body,
        html {
            margin: 0;
            padding: 0;
            background: #fff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #464646;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: 0;
            text-decoration: none
        }

        table {
            border-collapse: collapse !important
        }

        td,
        th {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #464646;
            line-height: 1.5em
        }

        .footer a,
        b a {
            text-decoration: none;
            color: #464646
        }

        a.btn {
            background: gold;
            padding: 10px;
            width: fit-content;
            border-radius: 8px;
            box-shadow: #000 3px 3px 8px -3px;
            font-weight: bolder;
            text-decoration: none !important;
            color: #000
        }

        td.center {
            text-align: center
        }

        .left {
            text-align: left
        }

        .body-padding {
            padding: 24px 20px 20px
        }

        .border-bottom {
            border-bottom: 1px solid #D8D8D8
        }

        table.full-width-gmail-android {
            width: 100% !important
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .header {
            font-weight: 700;
            font-size: 16px;
            line-height: 16px;
            height: 16px;
            padding-top: 19px;
            padding-bottom: 7px
        }

        .header a {
            color: #464646;
            text-decoration: none
        }

        .footer a {
            font-size: 12px
        }

        .button-url {
            color: #fff;
            background: #D01818;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
        }

        .button-url:hover {
            background: #D01818;
        }

        .paynow-button {
            background-color: #0070C0;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .paynow-button:hover {
            background-color: #005EA6;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body style="padding:0;margin:0;display:block;background:#fff;-webkit-text-size-adjust:none">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td valign="top" align="left" width="100%">

                    <table class="w320 full-width-gmail-android"
                        style="border-bottom:solid 2px #D01818;padding-bottom: 10px" cellpadding="0" cellspacing="0"
                        border="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="100%" height="48" valign="top">
                                    <table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="header center" width="100%">
                                                    <img style="height: 80px"
                                                        src="https://orbitlimo.ca/wp-content/uploads/2023/01/orbit-logo--189x84.png">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <center>
                                        @yield('content')
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="w320 full-width-gmail-android" bgcolor="#f9f8f8" style="background-color:#D01818"
                        cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="100%" height="48" valign="top" align="center">
                                    <center>
                                        <table class="full-width-gmail-android" cellspacing="0" cellpadding="0"
                                            border="0" width="80%" align="center">
                                            <tbody style="margin: 0 auto">
                                                <tr>
                                                    <td colspan="3" class="header center" width="100%">
                                                        <p style="color: white;font-size:12px">
                                                            ©{{ Carbon\Carbon::now()->year }} <a
                                                                href="http://hamptonchauffer.com"
                                                                style="color:#fff">hamptonchauffer.com</a> All
                                                            Rights
                                                            Reserved</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </center>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>