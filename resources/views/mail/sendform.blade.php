<head>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<title>SendForm</title>
</head>
<body>
	

<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<div class="row justify-content-center">
    <div class="col-md-8">
    	<div class="text-center">
    		<h1>Document of Hilton</h1>
    	</div>
    	<hr>
    	<h2>Dear {{$name??'You'}},</h2>

			  <p><strong>Name :</strong>
			    <label for="your-name">{{$name??'You'}}</label>
			  </p>
			  <p><strong>Email :</strong>
			    <label for="email">{{$email??'You'}}</label> is
			  </p>
			<div class="text-center">			
			  <p>
			    <label for="your-message">{{$content??'You'}}</label>
			  </p>
			</div>
			<div class="text-center">
			    <p>	
			      <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
			        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
				l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
			      </svg>
			      <small>Laravel Document</small>
			    </p>
			</div>
			<small class='website'>Vist <a href='http://10.11.13.51/doc' target='_blank'>us</a> to see my work</small>
			</body>