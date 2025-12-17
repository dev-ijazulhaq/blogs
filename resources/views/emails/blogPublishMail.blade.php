<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish New Blog</title>
</head>

<body style="margin:0; padding:0; background-color:#f5f6fa; font-family: Arial, sans-serif;">

    <table width="100%" cellspacing="0" cellpadding="0" style="background-color:#f5f6fa; padding:30px 0;">
        <tr>
            <td align="center">
                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 5px rgba(0,0,0,0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background:#4B7BF5; padding:20px; text-align:center;">
                            <h2 style="color:#ffffff; margin:0; font-size:24px; font-weight:600;">Blogify</h2>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding:30px 40px;">
                            <h3 style="color:#333; font-size:20px; margin:0 0 10px;">
                                New Blog Published
                            </h3>
                            <p style="color:#555; font-size:16px; margin:0 0 15px;">
                                A new blog has been successfully added:
                            </p>

                            <div style="background:#f1f3ff; border-left:4px solid #4B7BF5; padding:12px 15px; border-radius:4px; margin-bottom:20px;">
                                <strong style="font-size:18px; color:#2c3e50;">{{$title}}</strong>
                            </div>

                            <p style="color:#555; font-size:16px; margin:0 0 20px;">
                                You can now start creating and publishing blogs under this category.
                            </p>

                            <a href=""
                                style="display:inline-block; background:#4B7BF5; color:#fff; padding:12px 18px; border-radius:5px; text-decoration:none; font-size:15px; font-weight:600;">
                                View Blog
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f5f6fa; text-align:center; padding:18px;">
                            <p style="color:#999; font-size:13px; margin:0;">
                                © {{date('Y')}} Blogify. All Rights Reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>