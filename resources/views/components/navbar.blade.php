<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header mr-auto">
            <a class="navbar-brand" href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.homepage_title') }}</a>
        </div>
        <form method="GET" action="" class="form-inline" id="languageForm">
            <select name="language_slug" id="languageSelect" class="form-control"
                onchange="window.location.href='{{ url('/language') }}/' + this.value;">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="nl" {{ app()->getLocale() == 'nl' ? 'selected' : '' }}>Nederlands</option>
            </select>
        </form>
        <div id="navbar" class="form-inline">

            <script>
                (function () {
                    var cx = 'partner-pub-6236044096491918:8149652050';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchbox-only></gcse:searchbox-only>


        </div><!--/.navbar-collapse -->
    </div>
</nav>
