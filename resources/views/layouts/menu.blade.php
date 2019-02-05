<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach(MenuHelper::getArrOfMenu() as $menu)
            @if($menu['visible'])
                <li class="nav-item {{ isset($menu['items']) && $menu['items'] ? 'has-treeview menu-open' : '' }}">
                    <a 
                        href="{{ $menu['url'] != '#' ? route($menu['url']) : '#'  }}" 
                        class="nav-link {{ isset($menu['active']) && $menu['active'] ? "active" : "" }}"
                    >
                        <i class="fa fa-{{ $menu['icon'] }}"></i> <p>{{ $menu['label'] }}</p>
                    </a>
                    @if(isset($menu['items']) && !empty($menu['items']))
                        <ul class="nav nav-treeview">
                            @foreach($menu['items'] as $secondMenu)
                                <li class="nav-item">
                                    <a 
                                        href="{{ $secondMenu['url'] != '#' ? route($secondMenu['url']) : '#' }}" 
                                        class="nav-link {{ isset($secondMenu['active']) && $secondMenu['active'] ? "active" : "" }}"
                                    >
                                        <p>{{ $secondMenu['label'] }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</nav>