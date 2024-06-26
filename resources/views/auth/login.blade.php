<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
</head>
<body>
      <!-- Session Status -->
      <div class="mb-4">
        <!-- Session Status -->
        @if(session('status'))
            <div>{{ session('status') }}</div>
            
        @endif
    </div>
    
    <div class="bg-white rounded-lg py-5">
        <div class="container flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                            <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl">
                                @csrf
                            <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Sign In</h3>
                            <p class="mb-4 text-grey-700">Enter your email and password</p>
                            <div class="flex items-center mb-3">
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                                <p class="mx-4 text-grey-600">or</p>
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                            </div>
                            <x-input-label for="email" :value="__('Email')" class="mb-2 text-sm text-start text-grey-900">Email*</x-input-label>
                            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="fidz@gmail.com" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                            <div>
                                <x-input-label for="password" :value="__('Password')" class="mb-2 text-sm text-start text-grey-900" />
                    
                                <x-text-input id="password"  type="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                    
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                    
                            <div class="flex flex-row justify-between mb-8">
                                <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">   
                                    <input type="checkbox" checked class="sr-only peer"/>
                                    <div class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                                        <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                                    </div>
                                    <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"  class="mr-4 text-sm font-medium text-purple-blue-500">Forget password?</a>
                                @endif
                            </div>
                            <x-primary-button class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500 text-center">  {{ __('Log in') }}</x-primary-button>
                            <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="{{route('register')}}" class="font-bold text-grey-700">Create an Account</a></p>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    
        <div class="flex flex-wrap -mx-3 my-5">
            <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
                <p class="text-sm text-slate-500 py-1">
                    Welcome to  <a href="https://www.loopple.com/theme/motion-landing-library?ref=tailwindcomponents" class="text-slate-700 hover:text-slate-900" target="_blank">Coffee Restaurant</a> by <a href="https://www.loopple.com" class="text-slate-700 hover:text-slate-900" target="_blank">M Abdul Hafidz</a>.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
  
    
