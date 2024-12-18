<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Post Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            animation: gradient 5s ease infinite;
        }
        @keyframes gradient {
            0% { background-color: #f3f4f6; }
            50% { background-color: #e5e7eb; }
            100% { background-color: #f3f4f6; }
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold mb-4">Post Management</h1>
        <div class="mb-4">
            <input type="text" placeholder="Search posts..." class="border border-gray-300 rounded-lg py-2 px-4 w-full">
        </div>
        <div class="space-y-4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="font-semibold">Post Title 1</h2>
                <p class="text-gray-600">This is a brief description of the post.</p>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="font-semibold">Post Title 2</h2>
                <p class="text-gray-600">This is a brief description of the post.</p>
            </div>
            <!-- Add more posts as needed -->
        </div>
    </div>
</body>
</html>