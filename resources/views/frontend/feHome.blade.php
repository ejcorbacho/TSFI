@extends('layouts.frontend')

@section('content')
<html>      
    <head>
        <link rel="stylesheet" href="{{ asset('css/popularposts.css')}}">
        <link href="{{ asset('css/mainGrid.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>
    <body>
        <div class="col-md-12 col-lg-10 col-lg-offset-1">
        <!-- Portfolio Item Row -->
        <div class="row mainGridContainer">
            <!-- 1 APARTADO PRINCIPAL-->
            <div class="col-md-8 img-relative">
                <img class="img-responsive erc max" src="{{$posts[0]->fotosUrl}}" alt="">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[0]->nombre}}</h4>
						<h3>{{$posts[0]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[0]->contenido)!!}</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>
			<!-- 2 APARTADOS DE DERECHA-->
			<div class="col-sm-8 col-md-4">
                <img class="img-responsive erc sec" src="{{$posts[1]->fotosUrl}}" alt="">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[1]->nombre}}</h4>
						<h3>{{$posts[1]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[1]->contenido)!!}</p>
                    </a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio face">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio twit">&#xf099;</i>
				</div>
            </div>	
			
			<div class="col-sm-4 col-md-4">
                <img class="img-responsive erc sec" src="{{$posts[2]->fotosUrl}}">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[2]->nombre}}</h4>
						<h3>{{$posts[2]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[2]->contenido)!!}</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>
        <!--</div>
        <div class="row mainGridContainer">-->
            <!-- 3 APARTADOS DE ABAJO-->
            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc" src="{{$posts[3]->fotosUrl}}">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[3]->nombre}}</h4>
						<h3>{{$posts[3]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[3]->contenido)!!}</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>

            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc"  src="{{$posts[4]->fotosUrl}}">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[4]->nombre}}</h4>
						<h3>{{$posts[4]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[4]->contenido)!!}</p>
					</a>
				</div>
				<div class="icons">
					<i style="font-size:20px" class="fa espacio">&#xf082;</i>
					<i style="font-size:20px" class="fa espacio">&#xf099;</i>
				</div>
			</div>

            <div class="col-sm-4 rango">
                <img class="img-responsive erc terc" src="{{$posts[5]->fotosUrl}}">
				<div class="maximolineas">
					<a>
						<h4>{{$posts[5]->nombre}}</h4>
						<h3>{{$posts[5]->titulo}}</h3>
						<p >{!!html_entity_decode($posts[5]->contenido)!!}</p>
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
                <h2>Calendario</h2>
                <iframe src="https://calendar.google.com/calendar/embed?src=kravitz.sds%40gmail.com&ctz=Europe/Madrid" style="border: 0" width="100%" height="250px" frameborder="0" scrolling="no"></iframe>
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
