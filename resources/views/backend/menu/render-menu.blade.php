@if(isset($dataArr['custom']))
	<li>
	  <div class="col-sm-11">{{ $dataArr['title'] }}</div>
	  <div class="col-sm-1">
	    <p><span class="glyphicon glyphicon-remove rm-div" aria-hidden="true"></span></p>
	  </div>
	  	<input type="hidden" name="title[]" value="{!! $dataArr['title'] !!}">
	    <input type="hidden" name="type[]" value="3">
	    <input type="hidden" name="url[]" value="{{ $dataArr['url'] }}">
	    <input type="hidden" name="slug[]" value="{{ str_slug($dataArr['title']) }}">
	    <input type="hidden" name="object_id[]" value="">
	</li>
@else
	@foreach($dataArr['cap1'] as $k => $v)
	<li>
	  <div class="col-sm-11">{{ $dataArr['cap1_title'][$k] }}</div>
	  <div class="col-sm-1">
	    <p><span class="glyphicon glyphicon-remove rm-div" aria-hidden="true"></span></p>
	  </div>
	  	<input type="hidden" name="title[]" value="{!! $dataArr['cap1_title'][$k] !!}">
	    <input type="hidden" name="type[]" value="{{ $dataArr['cap1_type'][$k] }}">
	    <input type="hidden" name="url[]" value="">
	    <input type="hidden" name="slug[]" value="{{ $dataArr['slug'][$k] }}">	
	    <input type="hidden" name="object_id[]" value="{{ $dataArr['object_id'][$k] }}">	    
	</li>        
	@endforeach
@endif