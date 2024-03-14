<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <div class="mdl-layout-spacer"></div>
        <div class="avatar-dropdown" id="icon">
            <span>abv</span>
            <img
                style="border-radius: 50%; width: 30px; height:30px">
        </div>
        <!-- Account dropdawn-->
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content row">
                        <span><img
                                src=""
                                style="border-radius: 50%; width: 30px; height:30px"></span>
                        <span>acv</span>
                        <span
                            class="mdl-list__item-sub-title">{{\Illuminate\Support\Facades\Auth::user()->email ?? ""}}</span>
                    </span>
            </li>
            <li class="list__item--border-top"></li>
            <a href="{{route("bread.logout")}}">
                <li class="mdl-menu__item mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                            Log out
                        </span>
                </li>
            </a>
        </ul>


    </div>
</header>
