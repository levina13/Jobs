{{-- <h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ route('reset.password.get', $token) }}">Reset Password</a> --}}

<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Contact</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body style="background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%); display: grid;
height: 100%;
place-items: center;">
    <!--100% body table-->
    <table
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif; overflow: hidden;
        max-width: 390px;
        background: #fff;
        padding: 0px;
        border-radius: 15px;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        place-items: center;
        margin: 150px;
        margin-top: 80px;
        margin-right: 100px ;
        margin-bottom: 150px;
        margin-left: 100px;">
        <tr>
            <td>


                    <tr>
                        <td style="height:10px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="0 px" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:0px;background:#fff; border-radius:3px; text-align:center; ">
                                <tr>
                                    <td style="height:0x;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:35px;">
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            from: {{$name}}
                                        </p>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:600px;"></span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            {{$msg}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:0px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>

                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>
</html>
