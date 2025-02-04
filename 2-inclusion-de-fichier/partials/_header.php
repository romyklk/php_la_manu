<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>

<body class="font-sans antialiased">
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold text-slate-800">
                    Social<span class="text-teal-600">Flow</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="./home.php" class="text-slate-600 hover:text-teal-600 transition-colors">Features</a>
                    <a href="./pricing.php" class="text-slate-600 hover:text-teal-600 transition-colors">Pricing</a>
                    <a href="./testimonials.php" class="text-slate-600 hover:text-teal-600 transition-colors">Testimonials</a>
                    <button class="bg-teal-600 text-white px-6 py-2 rounded-full hover:bg-teal-700 transition-colors">
                        Get Started
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menu-btn" class="md:hidden">
                    <i data-feather="menu" class="w-6 h-6 text-slate-800"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 bg-white rounded-lg shadow-lg p-4">
                <div class="flex flex-col space-y-4">
                    <a href="#features" class="text-slate-600 hover:text-teal-600 transition-colors">Features</a>
                    <a href="#pricing" class="text-slate-600 hover:text-teal-600 transition-colors">Pricing</a>
                    <a href="#testimonials" class="text-slate-600 hover:text-teal-600 transition-colors">Testimonials</a>
                    <button class="bg-teal-600 text-white px-6 py-2 rounded-full hover:bg-teal-700 transition-colors">
                        Get Started
                    </button>
                </div>
            </div>
        </nav>
    </header>