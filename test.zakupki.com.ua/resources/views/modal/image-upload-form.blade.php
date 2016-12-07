<div class="modal fade" id="image-upload-form" tabIndex="-1">	
 <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload image</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('url'=>'#','method'=>'POST', 'files'=>true,'id'=>'form-upload-image')) !!}
         <div class="control-group">
          <div class="controls">
	  {!! Form::label('title',$value = 'Title') !!}	  
	  {!! Form::text('title', $value = null, $attributes = array()) !!}
	 <p></p>
	  {!! Form::label('title',$value = 'Image') !!}	  
          {!! Form::file('image', $attributes = array('accept'=>'image/jpeg')) !!}
          {!! Form::hidden('id','',$attributes = array('id'=>'id')) !!}	
          {!! Form::hidden('dependence','',$attributes = array('id'=>'dependence')) !!}	
	  <input type="hidden" name="_token" value="{{ csrf_token()}}">
	  <p class="errors">{!!$errors->first('image')!!}</p>
	@if(Session::has('error'))
	<p class="errors">{!! Session::get('error') !!}</p>
	@endif
        </div>
        </div>
        <div id="success"> </div>
      {!! Form::submit('Upload', array('class'=>'send-btn')) !!}
      {!! Form::close() !!}        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

 </div>
</div>