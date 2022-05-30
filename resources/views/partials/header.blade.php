<header class="relative z-50 overflow-hidden">
  <div class="top-0 left-0 right-0 flex flex-col bg-black fixed nav:items-center nav:flex-row">
    <a class="flex items-center p-5 nav:justify-center grad-diag-blue" href="{{ home_url('/') }}">
      <img class="w-[240px]" alt="PR Hoffman" src="@asset('assets/images/logo.png')" />
    </a>

    <button class="nav:hidden absolute top-[25px] right-[10px] text-white" @click.prevent="mobileNavOpen = !mobileNavOpen">
      <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" class="w-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"></path></svg>
    </button>

    @if (has_nav_menu('primary_navigation'))
      <nav class="justify-end flex-1 hidden w-full h-full pr-20 text-white nav-primary nav:flex" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex justify-end text-sm', 'echo' => false]) !!}
        <a href="/search" class="ml-6"><svg xmlns="http://www.w3.org/2000/svg" width="26.497" height="25.621"><g data-name="Group 6" fill="none" stroke="#fff" stroke-width="3"><g data-name="Ellipse 1" transform="translate(4.497)"><circle cx="11" cy="11" r="11" stroke="none"/><circle cx="11" cy="11" r="9.5"/></g><path data-name="Line 7" d="m7.997 18.278-7 6.222"/></g></svg></a>
      </nav>

      <nav class="w-full pt-5 text-white nav:hidden" x-cloak aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}" x-show="mobileNavOpen" @click="mobileNavOpen = !mobileNavOpen">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav:flex', 'echo' => false]) !!}
        <a href="/search" class="inline-block ml-6"><svg xmlns="http://www.w3.org/2000/svg" width="26.497" height="25.621"><g data-name="Group 6" fill="none" stroke="#fff" stroke-width="3"><g data-name="Ellipse 1" transform="translate(4.497)"><circle cx="11" cy="11" r="11" stroke="none"/><circle cx="11" cy="11" r="9.5"/></g><path data-name="Line 7" d="m7.997 18.278-7 6.222"/></g></svg></a>
      </nav>
    @endif
  </div>
</header>
