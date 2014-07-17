<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($this->pageTitle).' - '.Yii::app()->params['lael']; ?></title>

    <!-- Bootstrap -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" media="screen, projection" />
    
    <!--Estilos de formularios-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" media="screen, projection" />
    
    <!-- Estilos de slider-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/estilo.css" media="screen, projection" />
    <script language="JavaScript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
    <!--
     setTamAviso( 130 );
     setNumAvisos( 7 );
     timerID = setTimeout("moverAvisos()", 1000);  
    -->
    </script>
    <!--fin de slider-->
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="bs-docs-header" id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-12 text-right">
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/g_1.png"); ?>
                    <strong>Registrar</strong>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/g_1.png"); ?>
                    <strong>Iniciar Session</strong>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/g_1.png"); ?>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/tw_8.png"); ?>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/tw_8.png"); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="" id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                     <?php /*$this->widget('zii.widgets.CMenu',array(
                        'id'=>'nav',
                        'items'=>array(
                                array('label'=>'Inicio', 'url'=>array('/site/index')),
                                array('label'=>'Audios', 'url'=>array('/site/contact'),
                                    'items'=>array(
                                        array('label'=>'Quechua', 'url'=>array('/site/index')),
                                        array('label'=>'Ingles', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Francees', 'url'=>array('/site/page', 'view'=>'about')),
                                    ),     
                                ),
                            ),
                         ));*/?>
                    <ul class="nav nav-tabs nav-justified text-right">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="#">Audio</a></li>
                        <li><a href="#">Videos</a></li>
                        <li><a href="#">Interactivos</a></li>
                        <li><a href="#">Cil</a></li>
                        <li><a href="#">Editorial</a></li>
                        <li><a href="#">Miscelania</a></li>
                        <li><a href="#">Contacto</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!--div class="row">
            <div class="col-xs-12">
                <h1><?php //echo CHtml::encode(Yii::app()->name); ?></h1>
                 <p><?php //echo Yii::app()->params['lael']; ?></p>
            </div>
        </div-->
        
        <!--div class="row column">
            <div class="col-xs-12">
                <div class="nav nav-tabs">
                    <?php /*$this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                                array('label'=>'Inicio', 'url'=>array('/site/index')),
                                array('label'=>'Audios', 'url'=>array('/site/contact'),
                                    'items'=>array(
                                        array('label'=>'Quechua', 'url'=>array('/site/index')),
                                        array('label'=>'Ingles', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Francees', 'url'=>array('/site/page', 'view'=>'about')),
                                    ),     
                                ),
                                array('label'=>'Videos', 'url'=>array('/site/page', 'view'=>'about'),
                                    'items'=>array(
                                        array('label'=>'Quechua', 'url'=>array('/site/index')),
                                        array('label'=>'Ingles', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Francees', 'url'=>array('/site/page', 'view'=>'about')),

                                    ),
                                ),
                                array('label'=>'Interactivos', 'url'=>array('/site/index')),
                                array('label'=>'Cil', 'url'=>array('/site/index')),
                                array('label'=>'Editorial', 'url'=>array('/site/index')),
                                array('label'=>'Miscelania', 'url'=>array('/site/contact'),
                                    'items'=>array(
                                        array('label'=>'Cronograma', 'url'=>array('/site/index')),
                                        array('label'=>'Academico', 'url'=>array('/site/page', 'view'=>'about')),
                                        array('label'=>'Defensas', 'url'=>array('/site/page', 'view'=>'about')),
                                    ),
                                ),
                                array('label'=>'Contacto', 'url'=>array('/site/index')),
                                /*array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)*/
                       /* ),
                    ));*/ ?>
                </div>
            </div>
        </div-->
        <!--div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 columna">
                        <?php //echo CHtml::image(Yii::app()->theme->baseUrl."/image/sarahjulianne.jpg"); ?>
                </div>
        </div-->
        <!--div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 columna">
                        <?//php echo $content; ?>
                </div>
        </div-->
        
    </div>
    <?php echo $content; ?>  
    <div class="bs-docs-header" id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-justify">
                    <h1>Mision</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan 
                        et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget definition.</p>

                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-justify">
                    <h1>Vision</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan 
                        et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget definition.</p>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-justify">
                    <h1>Objetivos</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan 
                        et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget definition.</p>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-justify">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-justify">
                         <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/registro.png"); ?>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-justify">
                        <address>
                            <strong>Registrar</strong>
                            <br>
                            <strong>Iniciar Session</strong>
                            <br>
                   
                        </address>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-justify">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-justify">
                         <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/contact.png"); ?>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-justify">
                        <address>
                            <strong>Nuestras oficinas</strong>
                            <br>
                            <p>
                            Calle. Akdiepd Entre Lopeh Ksop Nro. 123<br>
                            Telf. +(591) 44123456<br>
                            Email: contacto@hum.umss.edu.bo<br>
                            Cbba .- Bolivia
                            </p>
                        </address>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
                    </div>
                    <!--div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div-->
              
                </div>
            </div>
            
            <!-- pie de pagina-->
            <hr>
             <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-justify">
                    <strong>Derechos reservados Lael 2014</strong>
                    <br>
                    <br>
                    <strong>Sitio compatible con</strong>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/cell_1.png"); ?>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/cell_2.png"); ?>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/cell_3.png"); ?>
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl."/image/cell_4.png"); ?>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-justify">
                    <strong>Desarrolladores</strong>
                    Univ. Leonardo Fabio,
                          Omar Huanca,
                          Rudy
              </div>
            </div>
            
            <!-- fin de pagina-->
            
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script language="JavaScript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js.js" type="text/javascript"></script>
    <!--script src="js/bootstrap.min.js"></script-->
  </body>
</html>
