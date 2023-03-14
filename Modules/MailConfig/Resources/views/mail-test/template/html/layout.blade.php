<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="background-color: #bac4d7; font-family:'Inter',Arial,Helvetica,sans-serif">

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{-- <div style="margin-bottom: 2rem">
                        <x-application-logo
                            style="display: block; width: 5rem; height: 5rem;  fill: #757e90; margin-bottom: 0.5rem" />
                        <span style="color: #585f6d; font-weight: bold">{{ config('app.name') }}</span>
                    </div> --}}
                    <tr>
                        <td>
                            <table style="margin-bottom: 2rem" class="header" align="center" cellpadding="0"
                                cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell" style="color: #585f6d;" align="center">
                                        <a href="{{ config('app.url') }}"
                                            style="display: inline-block; text-decoration: none">
                                            <img style="display: block; width: 5rem; height: 5rem; margin-bottom: 0.5rem"
                                                src="{{ asset('assets/img/logo.png') }}" alt="logo">
                                            <span
                                                style="color: #585f6d; font-weight: bold">{{ config('app.name') }}</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="body" style="border: hidden !important;" width="100%">
                            <table class="inner-body" align="center"
                                style="background-color: #fff; border-radius: 10px; padding: 1.25rem; width: 100%"
                                cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="color: #2b2e35;">
                                        {{ Illuminate\Mail\Markdown::parse($textMessage) }}

                                        {{-- {{ $subcopy ?? '' }} --}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- {{ $footer ?? '' }} --}}
                    <tr>
                        <td>
                            <table style="margin-top: 1.25rem; margin-bottom: 1.25rem" class="footer" align="center"
                                width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell" style="color: #585f6d;" align="center">
                                        {{-- {{ Illuminate\Mail\Markdown::parse($slot) }} --}}
                                        © {{ date('Y') }} <span
                                            style="font-weight: bold">{{ config('app.name') }}</span>. @lang('All rights reserved.')
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
