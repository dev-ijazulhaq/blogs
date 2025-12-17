<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Status Update</title>
</head>

<body style="margin:0; padding:0; background-color:#f5f6fa; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
        <tr>
            <td align="center">

                <table width="600" style="background:#fff; border-radius:8px; overflow:hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background:#4B7BF5; padding:20px; text-align:center;">
                            <h2 style="color:#fff; margin:0;">Blogify</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px 40px;">

                            <h3 style="margin-bottom:15px;">Account Status Update</h3>

                            <p>Hello <strong>{{ $userName }}</strong>,</p>

                            <p>Your account status has been updated.</p>

                            <!-- Status Box -->
                            <div style="
                            background: {{ $boxBg }};
                            border-left: 4px solid {{ $boxBorder }};
                            padding: 14px;
                            margin: 20px 0;
                            border-radius: 4px;
                        ">
                                <strong style="color: {{ $boxText }}; font-size:18px;">
                                    Account {{ ucfirst($statusText) }}
                                </strong>
                            </div>

                            <p style="margin-bottom:25px;">
                                {{ $bodyMessage }}
                            </p>

                            <a href="{{ $actionUrl }}"
                                style="
                               display:inline-block;
                               background: {{ $buttonBg }};
                               color:#fff;
                               padding:12px 20px;
                               border-radius:5px;
                               text-decoration:none;
                               font-weight:600;
                           ">
                                {{ $buttonText }}
                            </a>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f5f6fa; text-align:center; padding:15px;">
                            <p style="font-size:13px; color:#999;">
                                © {{ date('Y') }} Blogify. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>