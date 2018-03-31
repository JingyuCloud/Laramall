@extends('smartisan.layout.common')

@section('title')
{{$title}}
@stop

@section('content')
	<div class="main-box">
		@include('smartisan.lib.breadcrumb')
		<div class="row">
	    @include('smartisan.user.menu')
		@include('smartisan.order.detail')
		</div>
	</div><!--/main-box-->
@stop