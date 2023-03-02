<nav class="flex items-center justify-between py-2">
  <div class="flex flex-1">
    <a href="/" class="-ml-3">
      <span class="sr-only">Brand naam</span>
      <img class="h-14 w-auto" src="/img/logo 1.png" alt="Logo snoepfabriek">
    </a>
  </div>
  <div class="flex items-baseline gap-x-12 pr-1">
    <a href="{{ route('storingen.index') }}" class="{{ request()->is('storingen*', 'create') ? 'active' : '' }} text-lg font-medium leading-6 text-gray-900">Storingen</a>
    <a href="medewerkers" class="{{ request()->is('medewerkers') ? 'active' : '' }} text-lg font-medium leading-6 text-gray-900">Medewerkers</a>
    <a href="#" class="text-lg font-medium leading-6 text-gray-900">IT contact</a>
  </div>
</nav>
