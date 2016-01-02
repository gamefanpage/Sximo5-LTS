@extends('layouts.app')

@section('content')
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> MySQL Editor <small> Edit SQL Statement </small></h3>
      </div>
	  
        <ul class="breadcrumb">
          <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
          <li><a href="{{ URL::to('sximo/module') }}"> Module </a></li>
          <li class="active">  MySQL Editor  </li>
        </ul>     
	  	  
    </div>

	 <div class="page-content-wrapper m-t"> 
	@include('sximo.module.tab',array('active'=>'sql'))

	@if(Session::has('message'))
		   {{ Session::get('message') }}
	@endif
<div class="sbox">
 <div class="sbox-title"><h5> MySQL Statment Editor  </h5></div>
 <div class="sbox-content">
 {!! Form::open(array('url'=>'sximo/module/savesql/'.$module_name, 'class'=>'form-vertical ')) !!}
 <div class="infobox infobox-info fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p> <strong>Tips !</strong> U can use query builder tool such <a href="http://code.google.com/p/sqlyog/downloads/list" target="_blank">SQL YOG </a> , PHP MyAdmin , Maestro etc to build your query statment and preview the result , <br /> then copy the syntac here </p>	
</div>	


<div class="form-group">
<label for="ipt" class=" control-label">SQL SELECT & JOIN</label>
  <textarea name="sql_select" rows="5" id="sql_select" class="tab_behave form-control"  placeholder="SQL Select & Join Statement" >{{ $sql_select }}</textarea>
</div> 	

<div class="form-group">
<label for="ipt" class=" control-label">SQL WHERE CONDITIONAL</label>
  <textarea name="sql_where" rows="2" id="sql_where" class="form-control" placeholder="SQL Where Statement" >{{ $sql_where }}</textarea>
</div> 

<div class="infobox infobox-danger fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p> <strong>Warning !</strong> Please make sure SQL where not empty , for prevent error when user attempt submit  <strong>SEARCH</strong>   </p>	
</div>	
		
	

<div class="form-group">
<label for="ipt" class=" control-label">SQL GROUP</label>
 <textarea name="sql_group" rows="2" id="sql_group" class="form-control"   placeholder="SQL Grouping Statement" >{{ $sql_group }}</textarea>

</div> 
<div class="form-group">
<label for="ipt" class=" control-label"></label>
<button type="submit" class="btn btn-primary"> Save SQL </button>
</div> 	

 <input type="hidden" name="module_id" value="{{ $row->module_id }}" />
 <input type="hidden" name="module_name" value="{{ $row->module_name }}" />
 
 {!! Form::close() !!}
 </div>
</div>	
	
</div>	</div>
<div class="clr"></div>

@stop