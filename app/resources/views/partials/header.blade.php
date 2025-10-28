<header class="header" id="header">
    <nav class="nav-container">
        <a href="/" class="logo">
            <img src="/images/logo.PNG" alt="Uganda Securities Exchange">
        </a>
        <div class="market-status">
            <span class="status-indicator {{ ($siteContent['market_status'] ?? 'open') == 'open' ? 'open' : 'closed' }}"></span>
            <span class="status-text">{{ ucfirst($siteContent['market_status'] ?? 'Market Open') }}</span>
            <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
        </div>
        <ul class="nav-menu">
            @foreach($menuItems as $menuItem)
                <li class="nav-item">
                    <a href="{{ $menuItem->url ?: '#' }}" class="nav-link"
                       @if($menuItem->opens_new_tab) target="_blank" @endif
                       @if($menuItem->hasActiveChildren()) onclick="toggleMobileDropdown(event)" @endif>
                        @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                        {{ $menuItem->title }}
                        @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                    </a>
                    @if($menuItem->hasActiveChildren())
                        <ul class="dropdown">
                            @foreach($menuItem->activeChildren as $childItem)
                                @php
                                    // Force load the activeChildren relationship
                                    $childItem->load('activeChildren');
                                    $grandchildren = $childItem->activeChildren;
                                    $hasGrandchildren = $grandchildren->count() > 0;
                                @endphp

                                <li class="{{ $hasGrandchildren ? 'has-submenu' : '' }}">
                                    <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item"
                                       @if($childItem->opens_new_tab) target="_blank" @endif>
                                        @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                        {{ $childItem->title }}
                                        @if($hasGrandchildren) <span class="chevron-right"></span> @endif
                                    </a>

                                    @if($hasGrandchildren)
                                        <ul class="submenu">
                                            @foreach($grandchildren as $grandchildItem)
                                                <li>
                                                    <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item"
                                                       @if($grandchildItem->opens_new_tab) target="_blank" @endif>
                                                        @if($grandchildItem->icon) <i class="{{ $grandchildItem->icon }}"></i> @endif
                                                        {{ $grandchildItem->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <button type="button" id="mobile-menu-btn" class="mobile-menu-btn" onclick="toggleMobileMenu(); return false;">☰</button>
    </nav>
</header>
