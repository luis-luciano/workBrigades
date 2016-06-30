<ul>
    <li>
        <a href="{{ route('resume') }}"><i class="fa fa-home"></i> {{ singular('app.home') }}</a>
    </li>
    <li>
        <a href="{{ route('citizens.index') }}"><i class="fa fa-users"></i> {{ plural('citizens') }}</a>
    </li>
    <li>
        <a href="{{ route('requests.index') }}"><i class="fa fa-file"></i> {{ plural('requests') }}</a>
    </li>
    <li>
        <a href="{{ route('requests.index') }}"><i class="fa fa-clock-o"></i> {{ plural('app.history') }}</a>
    </li>
    <li>
        <a href="{{ route('users.profiles.index') }}"><i class="fa fa-user"></i> {{ singular('app.profile') }}</a>
    </li>
    <li>
        <a href="javascript:;"><i class="fa fa-cogs"></i> {{ singular('app.system') }}</a>
        <ul class="child-menu">
            <li><a href="{{ route('supervisions.index') }}"><i class="fa fa-street-view"></i> {{ plural('supervisions') }}</a></li>
            <li>
                <a href="javascript:;"><i class="fa fa-map"></i> {{ plural('colonies') }}</a>
                <ul class="child-menu">
                    <li><a href="{{ route('colonies.index') }}"><i class="fa fa-puzzle-piece"></i> {{ singular('app.manage') }}</a></li>
                    <li><a href="{{ route('colonies.scopes.index') }}"><i class="fa fa-crosshairs"></i> {{ plural('colonyScopes') }}</a></li>
                    <li><a href="{{ route('colonies.settlement-types.index') }}"><i class="fa fa-building"></i> {{ plural('settlementTypes') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="fa fa-file"></i> {{ plural('requests') }}</a>
                <ul class="child-menu">
                    <li><a href="{{ route('requests.states.index') }}"><i class="fa fa-yelp"></i> {{ plural('requestStates') }}</a></li>
                    <li><a href="{{ route('requests.priorities.index') }}"><i class="fa fa-chain-broken"></i> {{ plural('requestPriorities') }}</a></li>
                    <li><a href="{{ route('requests.typologies.index') }}"><i class="fa fa-asterisk"></i> {{ plural('typologies') }}</a></li>
                    <li><a href="{{ route('requests.capture-types.index') }}"><i class="fa fa-pencil-square"></i> {{ plural('captureTypes') }}</a></li>
                    <li><a href="{{ route('requests.types.index') }}"><i class="fa fa-clipboard"></i> {{ plural('requestTypes') }}</a></li>
                    <li>
                        <a href="javascript:;"><i class="fa fa-check-square-o"></i> {{ plural('requestReplies') }}</a>
                        <ul class="child-menu">
                            <li><a href="{{ route('requests.replies.resources.index') }}"><i class="fa fa-usd"></i> {{ plural('replyResources') }}</a></li>
                            <li><a href="{{ route('requests.replies.types.index') }}"><i class="fa fa-thumbs-up"></i> {{ plural('replyTypes') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="fa fa-users"></i> {{ plural('users') }}</a>
                <ul class="child-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-user-plus"></i> {{ singular('app.manage') }}</a></li>
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-sitemap"></i> {{ plural('roles') }}</a></li>
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-shield"></i> {{ plural('permissions') }}</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;"><i class="fa fa-power-off"></i> {{ singular('app.exit') }}</a>
    </li>
</ul>
