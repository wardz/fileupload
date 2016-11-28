<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Follow us</h5>

                <a href="#!"><div class="social-icons google"></div></a>
                <a href="#!"><div class="social-icons facebook"></div></a>
                <a href="#!"><div class="social-icons twitter"></div></a>
                <a href="#!"><div class="social-icons github"></div></a>

                <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>

                <ul>
                    <li>
                        <i class="small material-icons">question_answer</i>
                        <a class="grey-text text-lighten-3" href="{!! url('/contact') !!}">Contact</a>
                    </li>
                    <li>
                        <i class="small material-icons">info</i>
                        <a class="grey-text text-lighten-3" href="{!! url('/about') !!}">About</a>
                    </li>
                    <li>
                        <i class="small material-icons">toc</i>
                        <a class="grey-text text-lighten-3" href="{!! url('/tos') !!}">Terms of Service</a>
                    </li>
                    <li>
                        <i class="small material-icons">visibility</i>
                        <a class="grey-text text-lighten-3" href="{!! url('/policy') !!}">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            © {!! date('Y') . ' ' . config('app.name', 'Laravel') !!}
            <a class="grey-text text-lighten-4 right" href="#!">MIT license</a>
        </div>
    </div>
</footer>
