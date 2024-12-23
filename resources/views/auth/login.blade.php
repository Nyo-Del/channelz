<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<body class="bg-white">
    <x-auth-session-status class="mb-4" :status="session('status')" />

      <div class="mt-5 ">
        <div class="bg-light shadow-sm rounded col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-sm-6 offset-sm-3 px-5 mt-5  ">
            <div class=" mt-3 text-white h4 text-center ">
               <span class="text-dark ">
                <span class= ''>
                    <i class="fa-solid fa-video"></i>  Channel <span class="text-danger">Z</span>
                </span>
               </span>
            </div>
          <div class="my-4 pb-4">
            <form method="POST" action="{{ route('login') }}" class="form-control  shadow-lg">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input  id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2"  />
                </div>

                <!-- Password -->
                <div class="mt-4" >
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    class="form-control" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4" >
                    <label for="remember_me" class="inline-flex items-center" class="form-control">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="  mt-4" >

                    <x-primary-button class="ms-3" class="btn btn-danger btn-sm">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <a href="{{route('userhome')}}" class="btn btn-dark ms-3 p">
                        Back
                    </a>

                </div>
            </form>
          </div>
        </div>
      </div>

</body>
</html>
