@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('blog?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> Categories </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper m-t"> 
    <div class="sbox animated fadeInRight">
      <div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
      <div class="sbox-content">  
          <div class="toolbar-line ">
          @if($access['is_add'] ==1)
            <a href="{{ URL::to('blog/categoriesupdate') }}" class="tips btn btn-sm btn-white"
              onclick="SximoModal(this.href ,' Categories'); return false;"
              title="{{ Lang::get('core.btn_create') }}">
          <i class="fa fa-plus-circle "></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
          @endif  
          @if($access['is_remove'] ==1)
          <a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}">
          <i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
          @endif    
         
        </div>  

        <div class="table-responsive">
           {!! Form::open(array('url'=>'blog/categoriesdelete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
          <table class="table table-striped">
            <thead>
              <tr>
                
                <th width="50"> <input type="checkbox" class="checkall" /></th>
                 <th width="50"> ID </th>
                <th> Category </th>
                <th> Alias </th>
               
                <th width="100"> Action </th>
              </tr>

            </thead>

            <tbody>
             
                  @foreach($categories as $cat)
                <tr>   
                  <td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $cat->CatID }}" />  </td>
                  <td>{{ $cat->CatID}}</td>
                  <td>{{ $cat->name}}</td>
                  <td>{{ $cat->alias}}</td>
                  
                  <td>
                      <a href="{{ url('blog/categoriesupdate/'.$cat->CatID)}}" onclick="SximoModal(this.href ,' Categories'); return false;" class="btn btn-xs btn-white"><i class="fa fa-edit"></i></a>
                      
                  </td>
                 </tr>  
                  @endforeach
             

            </tbody>
          </table>
          {!! Form::close() !!}
        </div>

      </div>
    </div>  


  </div>
</div>  

@stop