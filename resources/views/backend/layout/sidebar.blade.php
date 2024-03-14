<div class="mdl-layout__drawer">
    @if('3=3')
        <header><a href="#"><i style="font-size: 40px;color: white" class="fas fa-home"></i>
            </a>Home</header>
    @else
        <header><a href="#"><i style="font-size: 50px;color: white" class="fas fa-home"></i></a>HOME</header>
    @endif
    <div class="scroll__wrapper" id="scroll__wrapper">
        <div class="scroller" id="scroller">
            <div class="scroll__container" id="scroll__container">
                <nav class="mdl-navigation">

                    <a class="mdl-navigation__link mdl-navigation__link--current" href="#">
                        <i class="material-icons" role="presentation">dashboard</i>
                        Table
                    </a>
                    @if('2=2')
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="#">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Create New Table
                        </a>
                    @endif
                    <div class="sub-navigation">
                        <a class="mdl-navigation__link">
                            <i class="material-icons">view_comfy</i>
                            Category List
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                        <div class="mdl-navigation">
                            <a class="mdl-navigation__link" href="#">
                                List Category
                            </a>
                        </div>
                        @if('1=1')
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="#">
                                    Create Category
                                </a>
                            </div>
                        @endif
                    </div>

                    <hr>
                    <div class="sub-navigation">
                        <a class="mdl-navigation__link">
                            <i class="material-icons">view_comfy</i>
                            Product
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                        <div class="mdl-navigation">
                            <a class="mdl-navigation__link" href="#">
                                List Product
                            </a>
                        </div>
                        @if('3=3')
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="#" >
                                    Create New Product
                                </a>
                            </div>
                        @endif
                    </div>
                    <hr>
                    @if('3=3')
                        <a class="mdl-navigation__link" href="#">
                            <i class="material-icons" role="presentation">person</i>
                            Account
                        </a>
                    @endif
                    <div class="mdl-layout-spacer"></div>
                    <hr>
                    <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard">
                        <i class="material-icons" role="presentation">link</i>
                        GitHub
                    </a>
                </nav>
            </div>
        </div>
        <div class='scroller__bar' id="scroller__bar"></div>
    </div>
</div>
