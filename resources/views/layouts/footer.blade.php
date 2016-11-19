<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Follow us</h5>
                <p class="grey-text text-lighten-4">Twitter, Facebook icons and so on here.</p>
            </div>

            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li>
                        <i class="tiny material-icons">question_answer</i>
                        <a class="grey-text text-lighten-3" href="#!">Support</a>
                    </li>
                    <li>
                        <i class="tiny material-icons">info</i>
                        <a class="grey-text text-lighten-3" href="#!">About</a>
                    </li>
                    <li>
                        <i class="tiny material-icons">toc</i>
                        <a class="grey-text text-lighten-3" href="#!">Terms of Service</a>
                    </li>
                    <li>
                        <i class="tiny material-icons">visibility</i>
                        <a class="grey-text text-lighten-3" href="#!">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <!-- Dropdown Structure -->
        <ul id="dropdown_language" class="dropdown-content">
            @foreach ($languages as $lang)
                <li><a href="{!! url($lang['url']) !!}">{!! $lang['name'] !!}</a></li>
            @endforeach
        </ul>

        <div class="container">
            © {!! date('Y') . ' ' . config('app.name', 'Laravel') !!}
            <a class="dropdown-button grey-text text-lighten-4 right" href="#!"
                data-activates="dropdown_language">@lang('layouts/footer.language')
                <i class="material-icons">arrow_drop_down</i>
            </a>
        </div>
    </div>
</footer>
