<x-layout>

    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Sign in  to your account
    </h1>
    <x-card class="py-8 px-16">
        <form method="POST" action="{{route('auth.store')}}">
@csrf

            <div class="mb-8">
<x-label :required="true" for="email">Email</x-label>
                <x-text-input name="email" type="email"/>
            </div>

            <div class="mb-8">
                <x-label :required="true" for="password"> Password</x-label>
                <x-text-input name="password" type="password"/>
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-2">
                 <input type="checkbox" class="rounded-sm border border-b-slate-400" name="remember"/>
                    <label for="remember">
                        Remember Me
                    </label>
                </div>

                <div>
                    <a class="text-indigo-600 hover:underline" href="#">
Forgot Password
                    </a>
                </div>
            </div>

            <x-button class="w-full bg-green-100">
Login
            </x-button>
        </form>
    </x-card>
</x-layout>
