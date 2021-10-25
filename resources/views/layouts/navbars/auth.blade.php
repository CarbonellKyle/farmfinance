<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/wheat.png">
            </div>
        </a>
        <a class="simple-text logo-normal">
            {{ __('Farm Finance') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="nc-icon nc-calendar-60"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'labor' ? 'active' : '' }}">
                <a href="{{ route('labor.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Labor') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'laborwage' || $elementActive == 'materials' || $elementActive == 'tax' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#expenses">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>
                            {{ __('Expenses') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="expenses">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'laborwage' ? 'active' : '' }}">
                            <a href="{{ route('expense.laborwage') }}">
                                <span class="sidebar-mini-icon">{{ __('LW') }}</span>
                                <span class="sidebar-normal">{{ __(' Labor Wage ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'materials' ? 'active' : '' }}">
                            <a href="{{ route('expense.materials') }}">
                                <span class="sidebar-mini-icon">{{ __('M') }}</span>
                                <span class="sidebar-normal">{{ __(' Materials ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'tax' ? 'active' : '' }}">
                            <a href="{{ route('expense.tax') }}">
                                <span class="sidebar-mini-icon">{{ __('LW') }}</span>
                                <span class="sidebar-normal">{{ __(' Tax ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'yields' ? 'active' : '' }}">
                <a href="{{ route('yield.index') }}">
                    <i class="nc-icon nc-shop"></i>
                    <p>{{ __('Yields') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'revenue' ? 'active' : '' }}">
                <a href="{{ route('revenue.index') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __('Sales') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'history' ? 'active' : '' }}">
                <a href="{{ route('history.index') }}">
                    <i class="nc-icon nc-watch-time"></i>
                    <p>{{ __('History') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'progress' ? 'active' : '' }}">
                <a href="{{ route('progress.index') }}">
                    <i class="nc-icon nc-sound-wave"></i>
                    <p>{{ __('Progress') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
