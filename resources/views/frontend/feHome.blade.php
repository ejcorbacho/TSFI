@extends('layouts.frontend')

@section('content')
<html>      
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="{{ asset('css/popularposts.css')}}">
        <link href="{{ asset('css/mainGrid.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- API Google Calendar -->
        <script src="{{ asset('js/frontend/googleCalendar.js')}}"></script>
        <!-- Widget Calendari -->
        <script src="{{ asset('fullcalendar-3.2.0/lib/moment.min.js')}}"></script>
        <script src="{{ asset('fullcalendar-3.2.0/fullcalendar.min.js')}}"></script>
        <script src="{{ asset('fullcalendar-3.2.0/locale/ca.js')}}"></script>
        <script src="{{ asset('js/frontend/calendar.js')}}"></script>

        <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.min.css')}}" rel='stylesheet' />
        <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
        <link href="{{ asset('/css/calendar.css')}}" rel="stylesheet" >
    </head>
    <body>
        <div class="col-md-12 col-lg-10 col-lg-offset-1">
        <!-- Portfolio Item Row -->
        <div class="row mainGridContainer">
            <div class="col-md-8 img-relative">
                <img class="img-responsive erc max" src="http://placehold.it/700x400" alt="">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p >Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>
			
			<div class="col-sm-8 col-md-4">
                <img class="img-responsive erc sec" src="http://placehold.it/700x400" alt="">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p >Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio face">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio twit">&#xf099;</i>
				</div>
            </div>	
			
			<div class="col-sm-4 col-md-4">
                <img class="img-responsive erc sec" src="http://placehold.it/700x400">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p>Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>
        <!--</div>
        <div class="row mainGridContainer">-->

            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc" src="http://placehold.it/700x400">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p>Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>

            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc" src="http://placehold.it/700x400">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p>Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>

            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc" src="http://placehold.it/700x400">
				<div class="maximolineas">
					<a>
						<h4>Categoria</h4>
						<h3>TITULO YEA</h3>
						<p>Lorrem iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a em iasdasdsad sad a asd fqwer32423a sd asd as dasd asd as d as 33333333333333 ddddddddddddd a asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, asdsdweer23n hola ajsjsia psum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>
        </div>
    </div>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div id="popularPostsSection" class="col-lg-10 col-lg-offset-1 col-md-12">
            <div id="popularPostsContainer" class="col-md-9 col-sm-12">
                <div class="popularPost">
                    <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="#">
                            <img src="http://placehold.it/700x400" alt="image placeholder">
                        </a>
                    </div>
                    <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="popularPostLink" href="#">
                        <h5 class="popularPostCategory">
                            Categoría
                        </h5>
                        <h1>Titulo del post</h1>
                        <p class="popularPostText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida cursus dolor in dictum. Curabitur facilisis erat purus, ut tincidunt enim tempor vel. Etiam sit amet mollis risus, eget consectetur nibh. Aliquam erat volutpat. Praesent ut porta magna. Fusce vel dictum arcu. Aenean sagittis, est quis hendrerit tempor, ante lacus sodales lorem, eu faucibus erat nisi interdum massa. Duis sapien est, pulvinar quis neque sed, dictum scelerisque orci. Sed pharetra, enim ac auctor condimentum, est libero rutrum nunc, id maximus diam turpis eget enim. Suspendisse eget sapien condimentum, pellentesque tortor a, volutpat quam.</p>
                        </a>
                        <div class="popularPostData">
                            <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate">19/02/16</p>
                            <span class="popularPostDataSeparator">•</span>
                            <a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter popularPostSocialIcon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="popularPostSeparator">
                <div class="popularPost">
                    <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="#">
                            <img src="http://placehold.it/700x400" alt="image placeholder">
                        </a>
                    </div>
                    <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="popularPostLink" href="#">
                        <h5 class="popularPostCategory">
                            Categoría
                        </h5>
                        <h1>Titulo del post</h1>
                        <p class="popularPostText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida cursus dolor in dictum. Curabitur facilisis erat purus, ut tincidunt enim tempor vel. Etiam sit amet mollis risus, eget consectetur nibh. Aliquam erat volutpat. Praesent ut porta magna. Fusce vel dictum arcu. Aenean sagittis, est quis hendrerit tempor, ante lacus sodales lorem, eu faucibus erat nisi interdum massa. Duis sapien est, pulvinar quis neque sed, dictum scelerisque orci. Sed pharetra, enim ac auctor condimentum, est libero rutrum nunc, id maximus diam turpis eget enim. Suspendisse eget sapien condimentum, pellentesque tortor a, volutpat quam.</p>
                        </a>
                        <div class="popularPostData">
                            <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate">19/02/16</p>
                            <span class="popularPostDataSeparator">•</span>
                            <a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter popularPostSocialIcon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="popularPostSeparator">
                <div class="popularPost">
                    <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="#">
                            <img src="http://placehold.it/700x400" alt="image placeholder">
                        </a>
                    </div>
                    <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="popularPostLink" href="#">
                        <h5 class="popularPostCategory">
                            Categoría
                        </h5>
                        <h1>Titulo del post</h1>
                        <p class="popularPostText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida cursus dolor in dictum. Curabitur facilisis erat purus, ut tincidunt enim tempor vel. Etiam sit amet mollis risus, eget consectetur nibh. Aliquam erat volutpat. Praesent ut porta magna. Fusce vel dictum arcu. Aenean sagittis, est quis hendrerit tempor, ante lacus sodales lorem, eu faucibus erat nisi interdum massa. Duis sapien est, pulvinar quis neque sed, dictum scelerisque orci. Sed pharetra, enim ac auctor condimentum, est libero rutrum nunc, id maximus diam turpis eget enim. Suspendisse eget sapien condimentum, pellentesque tortor a, volutpat quam.</p>
                        </a>
                        <div class="popularPostData">
                            <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate">19/02/16</p>
                            <span class="popularPostDataSeparator">•</span>
                            <a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter popularPostSocialIcon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="popularPostSeparator">
                <div class="popularPost">
                    <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="#">
                            <img src="http://placehold.it/700x400" alt="image placeholder">
                        </a>
                    </div>
                    <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="popularPostLink" href="#">
                        <h5 class="popularPostCategory">
                            Categoría
                        </h5>
                        <h1>Titulo del post</h1>
                        <p class="popularPostText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida cursus dolor in dictum. Curabitur facilisis erat purus, ut tincidunt enim tempor vel. Etiam sit amet mollis risus, eget consectetur nibh. Aliquam erat volutpat. Praesent ut porta magna. Fusce vel dictum arcu. Aenean sagittis, est quis hendrerit tempor, ante lacus sodales lorem, eu faucibus erat nisi interdum massa. Duis sapien est, pulvinar quis neque sed, dictum scelerisque orci. Sed pharetra, enim ac auctor condimentum, est libero rutrum nunc, id maximus diam turpis eget enim. Suspendisse eget sapien condimentum, pellentesque tortor a, volutpat quam.</p>
                        </a>
                        <div class="popularPostData">
                            <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate">19/02/16</p>
                            <span class="popularPostDataSeparator">•</span>
                            <a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter popularPostSocialIcon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="popularPostSeparator">
            </div>
            <div id="popularPostsSidebar" class="col-md-3 col-sm-12">
                <h2>Calendari</h2>
<!-- INICI CALENDARI -->
                <!--ANTIC
                <iframe src="https://calendar.google.com/calendar/embed?src=kravitz.sds%40gmail.com&ctz=Europe/Madrid" style="border: 0" width="100%" height="250px" frameborder="0" scrolling="no"></iframe>
                -->

                <div id='calendar'></div>

                <script async defer src="https://apis.google.com/js/api.js"
                        onload="this.onload=function(){};handleClientLoad()"
                        onreadystatechange="if (this.readyState === 'complete') this.onload()">
                </script>

<!-- FI CALENDARI -->
                <h2>Twitter</h2>
                <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-timeline twitter-timeline-rendered" style="position: static; visibility: visible; display: inline-block; width: 400px; height: 400px; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; min-height: 300px;" data-widget-id="585734069557792768" title="Twitter Timeline"></iframe>
                <h2>Enlaces</h2>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>

            </div>
        </div>
    </body>
</html>
@endsection
