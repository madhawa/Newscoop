{{ config_load file="{{ $gimme->language->english_name }}.conf" }}
{{ include file="_tpl/_html-head.tpl" }}

<body>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
 
{{ include file="_tpl/header.tpl" }}
<section role="main" class="internal-page section-page">
    <div class="wrapper">
        <header class="section-header">
            <div class="container">
                <div class="row">
                    <div class="span10">
                        <div class="breadcrumbs">
                            <h2>{{ #register# }}</h2>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="span12 more-news-tabs tab-sections">
                        <a class="back-link visible-phone" href="#">&larr; {{ #back# }}</a>
                    </div>
                </div>                       
            </div>
        </header>
        <div class="container">
            <section id="content">
                <div class="row home-featured-news">
                    <div class="span8 auth-page">
                        <div class="quetzal-form well">
                        {{ $form }}
                        </div>
                        <script type="text/javascript">
                        $('#email').change(function() {
                            $.post('{{ $view->url(['controller' => 'register', 'action' => 'check-email'], 'default') }}?format=json', {
                                'email': $(this).val()
                            }, function (data) {
                                if (data.status) {
                                    $('#email').css('color', 'green');
                                } else {
                                    $('#email').css('color', 'red');
                                }
                            }, 'json');
                        }).keyup(function() {
                            $(this).change();
                        });
                        </script>
                    </div> 
                    {{ include file="_tpl/user-sidebar.tpl" }}          

                </div> <!--end div class="row"-->
            </section> <!-- end section id=content -->
        </div> <!-- end div class='container' -->
    </div> <!-- end div class='wrapper' -->
</section> <!-- end section role main -->

{{ include file="_tpl/footer.tpl" }}

{{ include file="_tpl/_html-foot.tpl" }}

