<header class="header">
  @if(function_exists('the_custom_logo'))
    <div class="header__logo">
      {!! the_custom_logo() !!}
    </div>
  @endif

  <nav class="header__nav">
    {!! wp_nav_menu(['menu_class' => 'header__menu']) !!}

    @if(function_exists('pll_the_languages'))
      <ul class="header__lang">
        @php pll_the_languages(['display_names_as' => 'slug']);  @endphp
      </ul>
    @endif
  </nav>

</header>
