<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Post Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script>
        // Configure Tailwind CSS dark mode
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#0ea5e9',
                        }
                    }
                }
            }
        };

        $(document).ready(function() {
            // Retrieve saved theme from localStorage
            const savedTheme = localStorage.getItem('theme');

            // Apply the saved theme on page load
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
                $('.theme-toggle-icon').removeClass('fa-sun').addClass('fa-moon');
            } else {
                document.documentElement.classList.remove('dark');
                $('.theme-toggle-icon').removeClass('fa-moon').addClass('fa-sun');
            }

            // Toggle theme on button click
            $('#theme-toggle').click(function() {
                const isDarkMode = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
                
                // Update the icon based on the theme
                if (isDarkMode) {
                    $('.theme-toggle-icon').removeClass('fa-sun').addClass('fa-moon');
                } else {
                    $('.theme-toggle-icon').removeClass('fa-moon').addClass('fa-sun');
                }
            });

            // AJAX functionality to submit the login form without refreshing the page
            $('form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                var identifier = $('#identifier').val();
                var password = $('input[name="password"]').val();
                
               $.ajax({
                type: 'POST',
                url: url: '/post_management/backend/auth.php',
                data: {
                    identifier: identifier,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = 'dashboard.php?message=User successfully authenticated';
                    } else {
                        alert('Invalid credentials. Please try again.');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again later.');
                }
             });
            });
        });
    </script>

    <style>
        body {
            transition: background-color 0.5s, color 0.5s;
        }
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
        }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        ::placeholder {
            color: #9ca3af;
            opacity: 1;
        }
        button {
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #3b82f6;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen">

    <div class="absolute top-4 right-4">
        <button id="theme-toggle" class="bg-gray-300 p-2 rounded-full focus:outline-none">
            <i class="fas theme-toggle-icon fa-sun"></i>
        </button>
    </div>

    <div class="glassmorphism w-full max-w-md p-8 mx-auto mt-20">
        <h1 class="text-3xl font-bold dark:text-white text-center text-gray-800 mb-6">Welcome Back</h1>
        <form class="flex flex-col items-center justify-center" method="POST" action="login.php">
            <div class="mb-6 relative w-full">
                <label for="identifier" class="block text-sm font-medium dark:text-white mb-2  text-gray-700">Email or Username</label>
                <div class="relative">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="identifier" name="identifier" placeholder="Email or Username" class="border border-gray-300 rounded-lg py-2 pl-10 pr-4 w-full transition duration-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                </div>
            </div>
            <div class="mb-6 relative w-full">
                <label for="password" class="block text-sm font-medium dark:text-white mb-2 text-gray-700">Password</label>
                <div class="relative">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="border border-gray-300 rounded-lg py-2 pl-10 pr-4 w-full transition duration-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition duration-200">Login</button>
        </form>
    </div>

</body>
</html>
