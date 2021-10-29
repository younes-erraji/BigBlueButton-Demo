<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BigBlueButton</title>
        <style>
            body {
                margin: 0
            }
            .bg-gray {
                background-color: #2d3436
            }
            .flex.justify-center.items-center {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .min-h-screen {
                min-height: 100vh
            }
            .p {
                padding: 14px
            }
            .text-gray {
                color: #2d3436
            }
            .cursor-p {
                cursor: pointer;
            }
            .b-radius {
                border-radius: 4px
            }
            .border-none {
                border: none
            }
        </style>
    </head>
    <body class="bg-gray">
        <div class="flex justify-center min-h-screen items-center">

            <form action="{{ route('BBB') }}" class="flex justify-center">
                <button class="p-4 b-radius border-none text-gray cursor-p">Big Blue Button</button>
            </div>

        </div>
    </body>
</html>
