<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redirecting</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .spinner {
                border: 4px solid rgba(0, 0, 0, 0.1);
                border-left-color: #3490dc;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                animation: spin 1s linear infinite;
            }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    window.location.href = "/login";
                }, 2000);
            });
        </script>
    </head>

    <body class="bg-white flex items-center justify-center min-h-screen ">
        <div class="text-center">
            <img src="./assets/img/logo.png" alt="">
            <p class="text-gray-600">Redirecting to login page...</p>
            <div class="spinner mt-4 mx-auto"></div>
        </div>
    </body>

</html>
