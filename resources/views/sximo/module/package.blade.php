@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Module Packager <small> Create Package Installer </small></h3>
      </div>
  

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
    	<li><a href="{{ URL::to('sximo/module') }}"> Module </a></li>
        <li class="active"> Zip Module(s) as installer </li>
      </ul>
  </div> 
  <div class="page-content-wrapper"> 
  @if(Session::has('message'))    
       {{ Session::get('message') }}
  @endif  
  <div class="panel-default panel">
    <div class="panel-body">

    <ul class="parsley-error-list">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
     {!! Form::open(array('url'=>'sximo/module/dopackage', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
          <div class="col-md-6">
              <div class="header" >
                <h3> Instant Module</h3>
              </div>
              
              <div class="content col-md-12" >
                <div class="form-group  " >
                  <label for="Module Id" class=" control-label  text-left"> Application Title </label>
                    {!! Form::text('app_name', '',array('class'=>'form-control', 'placeholder'=>'Enter Application Title', 'required'=>'true'   )) !!} 
                </div>           
                  
                <div class="form-group  "  >
                  <label for="Module Id" class=" control-label  text-left"> SQL Statement </label>
                  <div class="">
                    {!! Form::textarea('sql_cmd', '',array('class'=>'form-control', 'placeholder'=>'Copy SQL Statement from PhpMyAdmin and paste here',  'rows' => 5 )) !!} 
                   </div> 
                </div>           
			  
                <div class="form-group  " >
                  <label for="Module Id" class=" control-label  text-left"> Upload SQL Statement File</label>
                  
                    {!! Form::file('sql_cmd_upload', '',array('class'=>'form-control', 'placeholder'=>'Enter SQL Statement',   )) !!} 
                 
                </div>           
               	
                <div class="form-group  " >
                  <label for="library" class=" control-label  text-left"> Include Library File(s)</label>
                    @foreach( $file_inc['app/Library'] as $file )
                  <div class="checkbox" >
                    <label>{!! Form::checkbox('file_library[]', $file ) !!} {!! $file !!} </label>
                  </div>
                    @endforeach
                </div>           
               	
                <div class="form-group  " >
                  <label for="lang" class=" control-label  text-left"> Include Language File(s)</label>
                    @foreach( $file_inc['Resources/lang/en'] as $file )
                  <div class="checkbox" >
                    <label>{!! Form::checkbox('file_lang[]', $file ) !!} {!! $file !!} </label>
                  </div>
                    @endforeach
                </div>           
               	
              
              </div>
              
          </div>
          
          
          <div class="col-md-6">
            <div class="header">
              <h3> What's this ?</h3>
            </div>
            
           <p> Zip Package is a tool for backup  your module as installer . <br /> 
		   	You can backup current module and install the modules to other application based Sximo builder - Edition Laravel </p>
		   </p> 
			<p> All module zipped are stored at <strong>uploads/zip</strong> folder , you can download them. </p>
              
          </div>
      
      
      <div style="clear:both"></div>  
        
        <div class="form-group">
        <label class="col-sm-4 text-right">&nbsp;</label>
        <div class="col-sm-8">  
        <button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
        <button type="button" onclick="location.href='{{ URL::to('module') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
        </div>    
    
        </div> 
        
        {!! Form::hidden('enc_id'      , $enc_id )     !!}
        {!! Form::hidden('enc_module'  , $enc_module ) !!}
     
     {!! Form::close() !!}
    </div>
  </div>  
</div>   </div>      
   <script type="text/javascript">
  $(document).ready(function() { 
     
  });
  </script>     
 @endsection 