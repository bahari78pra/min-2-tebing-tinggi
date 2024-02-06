<ul class="sidebar-menu scrollable pos-r">
  @foreach(App\Helper\Menu::get(auth()->user()->user_level) as $menu)
    <li class="nav-item">
      <a class="sidebar-link" href="{{ $menu->route }}">
        <span class="icon-holder">
          <i class="{{ $menu->class }}"></i> 
        </span>
        <span class="title">{{ $menu->name }}</span>
      </a>
    </li>
  @endforeach
</ul>