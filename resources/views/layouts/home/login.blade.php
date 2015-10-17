@include('layouts.partial.page-header')
 <body>
  @include('layouts.partial.nav')
  @include('layouts.partial.operationTips')
	<div class="am-g am-container php-bg-white  php-box-shadow">
	  	<div class="am-alert am-alert-warning div-custom am-text-left {{ count($errors) > 0 ? 'am-show' : 'am-hide' }}" data-am-alert>
	        <button type="button" class="am-close">&times;</button>
	        @foreach ($errors->all() as $error)
	          	<p>{{ $error }}</p>
	        @endforeach
	   	</div>
	   	<div class="am-u-lg-offset-2 am-u-md-offset-2 am-u-md-8 am-u-lg-8 am-u-sm-12  am-padding-top am-margin-top-xl ">
	        <form action="{{ url('users/login') }}" class="am-form am-form-horizontal" method="post">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="am-form-group am-form-icon">
	            <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">用户名：</label>
                    <div class="am-u-sm-10">
                      <i class="am-icon-user php-input-icon"></i>
                      <input type="text" name="name" placeholder="用户名 / 邮箱 / 手机号" class="php-input am-radius" required>
                    </div>
	            </div>
                <div class="am-form-group am-form-icon">
                    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">密码：</label>
                    <div class="am-u-sm-10">
                      <i class="am-icon-key php-input-icon"></i>
                      <input type="password" name="password" placeholder="密码" class="php-input am-radius" required>
                    </div>
                </div>
                <!-- <div class="am-form-group am-form-icon">
                    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">验证码：</label>
                    <div class="am-u-sm-10">
                        <i class="am-icon-code php-input-icon"></i>
                        <input type="text" name="verifycode" placeholder="验证码" class="php-input am-radius" required style="width:70%;display:inline-block">
                        <img id="js-get-verify-code"  src="verifycode.php" style="display:inline-block;cursor:pointer">                         
                    </div>
                </div> --> 
                <div class="am-form-group ">
                    <div class="am-u-sm-offset-2 am-u-sm-10">
                        <input type="checkbox" name="remember"> 下次自动登录
                    </div>
                </div>             
                <div class="am-form-group ">
                    <div class="am-u-sm-offset-2 am-u-sm-10">
                        <button type="submit" class="am-btn am-btn-primary am-radius php-button">登录</button>                                
                        <span class="am-text-xs">  <a href="">忘记密码？</a></span>
                        {{-- <p class="am-text-xs">
                            <span class="php-text-gray">
                                还没有账号？这就去<a href="{{ url('users/regist') }}">注册</a>
                            </span>                  
                        </p> --}}
                    </div>
                </div>
	         </form>
	    </div>
        <div class="am-u-md-2 am-u-lg-2 am-u-sm-2"></div>

    </div>
    @include('layouts.partial.footer')
 </body>
@include('layouts.partial.page-end') 