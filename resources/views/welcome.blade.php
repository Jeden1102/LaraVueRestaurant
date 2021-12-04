<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel=stylesheet>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel=stylesheet href="{{ mix('css/app.css') }}" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cutive+Mono&family=Recursive:wght@300&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/193f3f2978.js" crossorigin="anonymous"></script>
    <title>{{env('APP_NAME')}}</title><style>body{font-family:'Nunito',sans-serif}</style></head>
<body>
    <div id=app class=wrapper>
		<header id=appHeader class="app-header sticky top-0 left-0 test z-20">
			<app-header></app-header>
		</header>
		<main id=appMain class=app-main>
			<router-view></router-view>
		</main>
        <section id=cart class=cart>
            <app-cart></app-cart>
        </section>
		<footer id=appFooter class=app-footer>
			<app-footer></app-footer>
		</footer>
    </div> <script src="{{ mix('js/app.js') }}"></script> </body>
</html>
<style>


</style>