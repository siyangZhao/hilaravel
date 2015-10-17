@include('layouts.partial.page-header')
 <body>
  @include('layouts.partial.nav')
  @include('layouts.partial.operationTips')
  <div class="am-g am-container php-bg-white  php-box-shadow am-padding-bottom">
  	<section name="top_tips" class="am-margin-top">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-12">
            <p class="am-text-sm am-margin-top-xs">时间：<?php echo date('Y-m-d'); ?></p>
        </div>
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-12 am-text-right">
            <a class="am-btn am-btn-primary am-radius am-text-sm" href="{{ url('home/post') }}">
            <i class="am-icon-eyedropper"></i>&nbsp;快去发帖
            </a>
        </div> 
    </section>
  </div>
  @include('layouts.partial.footer')
 </body>
@include('layouts.partial.page-end')