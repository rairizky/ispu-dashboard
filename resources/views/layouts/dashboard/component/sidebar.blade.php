<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            {{-- category --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-alert"></i>
                    </span>
                    <span class="title">Category</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('dashboard.category.index') }}">Master Data</a>
                    </li>
                </ul>
            </li>

            {{-- location --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pushpin"></i>
                    </span>
                    <span class="title">Location</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('dashboard.location.index') }}">Master Data</a>
                    </li>
                </ul>
            </li>

            {{-- classification --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-compass"></i>
                    </span>
                    <span class="title">Classification</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('dashboard.daily.index') }}">Daily Data</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
