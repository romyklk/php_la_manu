<?php
include("partials/_header.php");

/* 
Nous pouvons inclure des fichiers PHP dans un autre fichier PHP.Cela permet de réutiliser du code sans avoir à réécrire le code à chaque fois.

include() et require() permettent d'inclure un fichier PHP.

include_once() et require_once() permettent d'inclure un fichier PHP une seule fois même si il est inclus plusieurs fois.

Il n'y a pas de différence entre les deux fonctions.Mais quand il y a des erreurs, include() affiche l'erreur et continue à exécuter le code, tandis que require() affiche l'erreur et arrête l'exécution du code.

Il est recommandé d'utiliser require_once() pour les fichiers qui sont inclus dans des pages PHP.Cela permet de s'assurer que le fichier est inclus une seule fois même et de gérer les erreurs avant de continuer l'exécution du code.
*/

?>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-slate-50 to-teal-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="hero-text text-5xl md:text-6xl font-bold text-slate-800 leading-tight">
                        Home
                        <span class="text-teal-600">Page</span>
                    </h1>
                    <p class="hero-text text-xl text-slate-600">
                        Streamline your social media management with powerful tools, analytics, and automation.
                    </p>
                    <div class="hero-text flex space-x-4">
                        <button class="bg-teal-600 text-white px-8 py-3 rounded-full hover:bg-teal-700 transition-colors">
                            Start Free Trial
                        </button>
                        <button class="border-2 border-slate-300 text-slate-700 px-8 py-3 rounded-full hover:border-teal-600 hover:text-teal-600 transition-colors">
                            Watch Demo
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://plus.unsplash.com/premium_photo-1683580362892-fc31c2ff935b?q=80&w=3348&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Dashboard Preview" class="rounded-lg shadow-xl" data-aos="fade-left">
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center space-x-2">
                            <i data-feather="trending-up" class="w-5 h-5 text-teal-600"></i>
                            <span class="text-slate-800 font-semibold">+147% Engagement</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
include_once("partials/_footer.php");
include_once("partials/_footer.php");
include_once("partials/_footer.php");
?>



