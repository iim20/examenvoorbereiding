<nav class="flex items-center justify-between py-2 relative z-10">
  <div class="flex flex-1">
    <a href="/" class="-ml-3">
      <span class="sr-only">Brand naam</span>
      <img class="h-14 w-auto" src="/img/logo 1.png" alt="Logo snoepfabriek">
    </a>
  </div>
  <div class="flex items-baseline gap-x-12 pr-1">
      @if (Route::has('login'))
        @auth
          <a href="{{ route('storingen.index') }}" class="{{ request()->is('storingen*', 'create') ? 'active' : '' }} text-lg font-medium leading-6 text-gray-900">Storingen</a>
          <a href="/medewerkers" class="{{ request()->is('medewerkers') ? 'active' : '' }} text-lg font-medium leading-6 text-gray-900">Medewerkers</a>
          <span class="hidden opacity-25 md:block text-2xl">|</span>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="text-lg font-medium leading-6 text-gray-900" type="submit">Logout</button>
          </form>
          @else
            <a href="{{ route('login') }}" class="text-lg font-medium leading-6 text-gray-900">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-lg font-medium leading-6 text-gray-900">Register</a>
          @endif
        @endauth
      @endif
  </div>
</nav>
