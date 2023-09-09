<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5;url=/">

    <title>Payment Status</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .success-animation {
            margin: 48px auto;
        }

        .failure-animation {
            margin: 64px auto;
        }

        .checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke-miterlimit: 10;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            position: relative;
            top: 5px;
            right: 5px;
            margin: 0 auto;
        }


        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            fill: #bbf7d0;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark__cross {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            fill: #fecaca;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .success-animation .checkmark {
            stroke: #4bb71b;
            box-shadow: inset 0px 0px 0px #4bb71b;

        }

        .success-animation .checkmark__circle {
            stroke: #4bb71b;

        }

        .failure-animation .checkmark {
            stroke: red;
            box-shadow: inset 0px 0px 0px red;

        }

        .failure-animation .checkmark__circle {
            stroke: red;

        }


        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4bb71b;
            }
        }

        .px-16 {
            padding-left: 64px;
            padding-right: 64px;
        }

        .py-16 {
            padding-top: 64px;
            padding-bottom: 64px;
        }

        .p-16 {
            padding: 64px;
        }
    </style>
</head>

<body class="h-[100vh] flex flex-col justify-center">

    <div
        class="w-max mx-auto p-16 border rounded rounded-2 shadow {{ $success ? 'bg-green-200 border-green-600' : 'bg-red-200 border-red-600' }}">
        @if ($success)
            <div class="">
                <div class="success-animation">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                </div>
                <div class="text-xl font-bold text-green-600">
                    {{ $message }}
                </div>
                <div class="text-sm font-base text-center">Thank you for choosing us</div>


            </div>
        @else
            <div>
                <div class="failure-animation">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__cross" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark_circle" stroke-linecap="round" fill="none"
                            d="M16 16 36 36 M36 16 16 36
                    " />
                    </svg>
                </div>
                <div class="text-xl font-bold text-red-600 text-center">
                    {{ $message }}
                </div>
            </div>
        @endif

        <div class="text-center mt-4 text-lg">Redirecting in <span id="count">5</span> seconds...</div>



    </div>

    <script>
        let count = document.querySelector("#count");
        let num = parseInt(count.innerHTML)
        let intervalId = setInterval(() => {
            count.innerHTML = --num;
            // stop interval
            if (num === 0) {
                clearInterval(intervalId);
                intervalId = null;
            }
        }, 1000);
    </script>

</body>

</html>
