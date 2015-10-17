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
   	    <div class="am-u-lg-offset-1 am-u-lg-10 am-u-md-offset-1 am-u-md-10 am-u-sm-12 am-margin-top-xl">
			<form class="am-form" method="post" action="{{ url('users/post') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
  
				<div class="am-form-group am-form-icon">
				    <label for="title">主题：</label>
				    <input type="text" class="am-radius php-input" name="title" placeholder="输入帖子主题"  required>
			    </div>

			    <div class="am-form-group">
	                <label for="type">分类</label>
	                    <select name="node_id" class="am-input-sm border-radius" >
					        @foreach ($nodes as $node)
					        	<option value="{{ $node->id }}">{{ $node->name }}</option>
					        @endforeach
	                    </select>
	                <span class="am-form-caret"></span>
	            </div>

			    <div class="am-form-group">
			        <label for="doc-ta-1">内容：</label>
			        <textarea class="am-text-sm am-radius php-textarea" rows="5" name="content" required></textarea>
			    </div>	

			    <p><button type="submit" class="am-btn am-btn-primary am-radius am-text-sm">发布</button></p>				    
			</form> 
		</div> 
		<div class="am-u-lg-1 am-u-md-1"></div>
	</div>
    @include('layouts.partial.footer')
 </body>
@include('layouts.partial.page-end') 