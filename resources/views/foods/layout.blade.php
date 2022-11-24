<!DOCTYPE html>
<html>

<head>
    <title>Virtueller Kühlschrank</title>
    
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Youre logged in!') }}                 
            </h2>
           
        </x-slot>
         <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">              
                </div>                      
                </div>
        <div class="container">
    @yield('content')   
</div>
 
        <div class="py-12">
           
            </div>
        </div>
    </x-app-layout> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    
</body>
</html>
    </html>
