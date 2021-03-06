<div class="header-top">
	<div class="header-top-bb">


            @if(Auth::check('user'))
            	<span>
                	{{trans('front.welcome_to_my_site')}}
               </span>
               <span>
               	{{Auth::user('user')->username}}
               </span>
               <a href="{{url('auth/center')}}">{{trans('front.user_center')}}</a>
               <span>|</span>
               <a href="{!!url('auth/logout')!!}">{{trans('front.logout')}}</a>
            @else

            <a href="{!!url('auth/login')!!}">{!!trans('front.login')!!}</a>
            <span>|</span>
           <a href="{!!url('auth/register')!!}">{!!trans('front.register')!!}</a>

            @endif
    </div><!--/bb-->
</div><!--/header-top-->


<div class="box-middle">

    	<div id="header-logo" class="col-md-3">
        		<a href="{!!url('/')!!}" title="phpstore-b2c演示站">
                	<img src="{!!url($shop_logo)!!}" alt="phpstore首款基于laravel框架的商城系统" />
                </a>
        </div>

        <div id="search-bar">

             <form action="{!!url('search')!!}" method="post" class="form-search">
             	<input type="text" name="keywords" id="keywords" class="home-search" placeholder="{!!trans('front.search_default_value')!!}" />
                <button type="submit" class="home-search-btn">
                	<i class="fa fa-search"></i>
                </button>
            </form>
        </div>

        <div id="header-cart">


            <p class="cart-num">
            	<a href="{!!url('cart')!!}">
                	{!!trans('front.cart_info')!!}
                	<span id="cart-number-ajax-btn">{!!$cart_num!!}</span>
                </a>
            </p>
        </div>

</div><!--/box-middle-->


<div id="header-bottom">
	<div class="header-bottom-bb">
    		<ul class="main-nav">
            	<li class="item">
                	<a href="{!!url('/')!!}">首页</a>
                </li>
                @if($middle_nav)
                @foreach($middle_nav as $item)

                <li class="item">
                	<a href="{!!$item->url()!!}" @if($item->link) target="_blank" @endif >{!!$item->nav_name!!}</a>
                </li>

                @endforeach
                @endif
            </ul>
    </div>
</div><!--/header-bottom-->

<div class="color-style-content">
		<div class="open-close-btn color-close">
				<i class="fa fa-2x fa-cog fa-spin"></i>
		</div>
		<div class="tit">{!!trans('front.color_select')!!}</div>
		<div class="color-grid">
				@if($style_list)
				{!!$style_list!!}
				@endif
		</div><!--/color-grid-->
</div>
