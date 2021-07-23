@if ($message = Session::get('succ'))  
<div class="alert alert-success alert-block">  
    <button type="button" class="close" data-dismiss="alert">?</button>   
        <strong>{{ $message }}</strong>  
</div>  
@endif  