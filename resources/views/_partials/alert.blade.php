  
@if (count($errors) > 0)
    
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> <strong>Errors</strong>
        <hr class="message-inner-separator">
        <ul class="list-inline">
            @foreach ($errors->all() as $error)
                <li> <i class="glyphicon glyphicon-remove-sign"></i> {!! $error !!}</li>
            @endforeach
        </ul>
    </div>        
    
@endif

@if ($message = Session::get('success'))
    
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <span class="glyphicon glyphicon-check"></span> <strong>Success</strong>
        <hr class="message-inner-separator">
        <p><span class="glyphicon glyphicon-ok-sign"></span> {!! $message !!}</p>
    </div>        
    
@endif
        
@if ($message = Session::get('info'))

    <div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <span class="glyphicon glyphicon-info-sign"></span> <strong>Info</strong>
        <hr class="message-inner-separator">
        <p>{!! $message !!}</p>
    </div>        

@endif
        
@if ($message = Session::get('warning'))
    
    <div class="alert alert-warning fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <i class="glyphicon glyphicon-record"></i> <strong>Warning</strong>
        <hr class="message-inner-separator">
        <p>{!! $message !!}</p>
    </div>        
    
@endif
