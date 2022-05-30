<form role="search" method="get" class="flex search-form" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input
      type="search"
      class=""
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>

  <input
    type="submit"
    class="inline-flex px-5 items-center hover:cursor-pointer justify-center text-center leading-tight py-1 text-sm uppercase border font-semibold hover:bg-blue-800 border-transparent transform duration-300 bg-coral hover:text-blue-400 max-w-[200px]"
    value="{{ esc_attr_x('Search', 'submit button', 'sage') }}"
  >
</form>
