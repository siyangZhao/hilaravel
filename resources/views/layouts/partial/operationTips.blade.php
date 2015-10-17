
 @if (\Session::has('returnInf'))
 	<div class="am-u-lg-offset-2 am-u-md-12 am-u-lg-8 am-u-sm-12 am-margin-top">
      <div class="am-radius am-alert {{ session('operationResult') }}" data-am-alert>
         <button type="button" class="am-close">&times;</button>
         @foreach (session('returnInf') as $element)
           <p class="am-kai">{!! $element !!}</p>
         @endforeach
      </div>
    </div>
 @endif