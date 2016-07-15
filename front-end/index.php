<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="brasilEleicoes">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if(!empty($_GET['candidato'])) : ?>
        <meta property="og:title" content="Eu votei no <?php echo $_GET['candidato']; ?>! E você, vai votar em quem?"/>
        <meta name="description" content="Acompanhe os nossos pré-candidatos a prefeitura do Brasil!">
    <?php else : ?>
        <meta property="og:title" content="Brasil Eleições"/>
        <meta name="description" content="Vamos acompanhar em tempo real os nossos pré-candidatos a prefeitura do Brasil? Vamos.">
    <?php endif; ?>

    <meta property="og:site_name" content="Brasil Eleições"/>
    <meta name="author" content="Luiz Almeida">
    <meta property="og:image" content="http://1.bp.blogspot.com/-W7Gk-uAODOU/VD8QS8ZTxZI/AAAAAAAAGwM/aPZpqixk944/s1600/tropa%2Bde%2Belite.png" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />

    <title>Brasil Eleições</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-31493811-2', 'auto');
      ga('send', 'pageview');

    </script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-9735122012959131",
        enable_page_level_ads: true
      });
    </script>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Brasil Eleições</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#participe">Participe Já</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#sobre">Sobre</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->

        <a class="github-link" href="https://github.com/lhas/eleicoes-reais"><img style="border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Brasil Eleições</span>
                        <hr class="star-light amarelo">
                        <span class="skills">Vamos acompanhar em tempo real os nossos pré-candidatos às prefeituras do Brasil? Vamos!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contact Section -->
    <section id="participe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Participe Já</h2>
                    <hr class="star-primary amarelo">
                </div>
            </div>

            <div class="row" ng-controller="AuthCtrl">
                <div class="col-lg-8 col-lg-offset-2">

                    <p>
                        <a href="javascript:void(0);" ng-if="!isAuthenticated()" ng-click="authenticate('facebook')" class="btn btn-block btn-success btn-lg" style="background: #446CB3; border: none;"><i class="fa fa-facebook"></i> Entrar com Facebook</a>
                    </p>

                    <div ng-if="isAuthenticated()" ng-controller="FormularioCtrl" class="text-center">

                    <div ng-hide="currentUser.cidade">
                        <img ng-if="currentUser.facebook" ng-src="//graph.facebook.com/{{currentUser.facebook}}/picture?type=large" height="150" alt="" class="img-circle">
                        <h3>Olá, {{currentUser.displayName}}! Qual é a sua cidade?</h3>

                        <div class="list-group">
                            <a href="javascript:void(0);" ng-click="escolherCidade(value)" class="list-group-item" ng-repeat="(value, cidade) in cidades">
                                <h4 class="list-group-item-heading">{{cidade}}</h4>
                            </a>
                        </div>

                    </div>

                        <div ng-show="currentUser.cidade && !currentUser.candidato">
                            <h3>Qual será o seu candidato?</h3>

                            <div class="list-group">
                                <a href="javascript:void(0);" ng-click="escolherCandidato(candidato)" class="list-group-item" ng-repeat="candidato in candidatos[currentUser.cidade]">
                                    <h4 class="list-group-item-heading">{{candidato.nome}}</h4>
                                    <p class="list-group-item-text">{{candidato.partido}}</p>
                                </a>
                            </div>
                        </div>

                        <div ng-show="currentUser.candidato">
                        <!-- <div> -->
                            <h3>Obrigado! Compartilhe seu voto para ver o Ranking</h3>

                            <div class="table-responsive" ng-if="compartilhou">
                                <table class="table text-center">
                                    <thead>
                                        <tr style="font-size: 18px;">
                                            <th>Candidato</th>
                                            <th>Partido</th>
                                            <th>Total de Votos até agora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="font-size: 20px;" ng-repeat="voto in ranking | orderObjectBy: 'total':true">
                                            <td><span class="label label-default">{{voto.nome}}</span></td>
                                            <td><span class="label label-default">{{voto.partido}}</span></td>
                                            <td><span class="label label-success">{{voto.total}} votos</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <a ng-href="https://www.facebook.com/sharer/sharer.php?u=http://brasileleicoes.com.br/?candidato={{ currentUser.candidato.nome | escape }}" target="_blank" ng-click="compartilhou = true" class="btn btn-block btn-success btn-lg" style="background: #446CB3; border: none;"><i class="fa fa-share"></i> Compartilhar meu voto no Facebook</a>

                        </div>


                        <a href="#" ng-click="logout()" class="btn btn-default pull-right" style="margin-top: 40px;">Desconectar</a>
                    </div>

                </div>
            </div>

            <div id="ads" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Arranha céu - Brasil Eleiçoes -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-9735122012959131"
                         data-ad-slot="1822830808"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sobre</h2>
                    <hr class="star-light amarelo">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 sobre-content">
                    <p>Você provavelmente, assim como qualquer brasileiro, não acredita no governo brasileiro e no que ele diz. Também não acredita nas urnas eletrônicas.</p>
                    <p>Na história da democracia brasileira tivemos diversos casos de possíveis fraudações eleitoriais que foram abafadas pela mídia.</p>
                    <p>Você assim como eu quer saber REALMENTE quem está em alta?</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#participe" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Participe Já!
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Brasil Eleições de 2016.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="bower_components/satellizer/satellizer.js"></script>
    <script src="js/app.js"></script>

    <script type="text/javascript">stLight.options({publisher: "3f4ae795-5514-43d8-8427-134afdaf094a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <script>
    var options={ "publisher": "3f4ae795-5514-43d8-8427-134afdaf094a", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "pinterest", "whatsapp", "googleplus"]}};
    var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
    </script>

</body>

</html>
