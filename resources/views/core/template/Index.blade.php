@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}">Home</a></li>
        <li> Config</li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>
	   
	</div>
 <div class="page-content-wrapper m-t">  
@include('core/template/Tab',array('active'=>$page))


  <div class="row">
    <div class="col-sm-6">
      <div class="box">
        <h5> Alert </h5>   
        <div class="alert alert-danger fade in block-inner">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="icon-cancel-circle"></i> Error alert </div>
        <div class="alert alert-success fade in block-inner">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="icon-checkmark-circle"></i> Success alert </div>
        <div class="alert alert-warning fade in block-inner">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="icon-warning"></i> Warning &amp; default alert </div>
        <div class="alert alert-info fade in">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="icon-info"></i> Good to know! Info alert </div>
       </div>  

    </div>
    <div class="col-sm-6">
      <div class="box">
     <h5> Tables </h5>   
<table class="table table-bordered">
          <thead class="no-border">
            <tr>
              <th>Type</th>
              <th class="text-center">Label</th>
              <th class="text-center">Icon</th>
              <th class="text-center">Badge</th>
            </tr>
          </thead>
          <tbody class="">
            <tr>
              <td style="width:30%;">Default</td>
              <td class="text-center"><span class="label label-default">Default</span></td>
              <td class="text-center"><a href="#" class="label label-default"><i class="fa fa-pencil"></i></a></td>
              <td class="text-center"><span class="badge">25</span></td>
            </tr>
            <tr>
              <td>Primary</td>
              <td class="text-center"><span class="label label-primary">Primary</span></td>
              <td class="text-center"><a href="#" class="label label-primary"><i class="fa fa-pencil"></i></a></td>
              <td class="text-center"><span class="badge badge-primary">6</span></td>
            </tr>
            <tr>
              <td>Success</td>
              <td class="text-center"><span class="label label-success">Success</span></td>
              <td class="text-center"><a href="#" class="label label-success"><i class="fa fa-pencil"></i></a></td>
              <td class="text-center"><span class="badge badge-success">8</span></td>
            </tr>
            <tr>
              <td>Info</td>
              <td class="text-center"><span class="label label-info">Info</span></td>
              <td class="text-center"><a href="#" class="label label-info"><i class="fa fa-info-circle"></i></a></td>
              <td class="text-center"><span class="badge badge-info">3</span></td>
            </tr>
            <tr>
              <td>Warning</td>
              <td class="text-center"><span class="label label-warning">Warning</span></td>
              <td class="text-center"><a href="#" class="label label-warning"><i class="fa fa-warning"></i></a></td>
              <td class="text-center"><span class="badge badge-warning">5</span></td>
            </tr>
            <tr>
              <td>Danger</td>
              <td class="text-center"><span class="label label-danger">Danger</span></td>
              <td class="text-center"><a href="#" class="label label-danger"><i class="fa fa-pencil"></i></a></td>
              <td class="text-center"><span class="badge badge-danger">54</span></td>
            </tr>
          </tbody>
        </table>

    </div>
     </div>
  </div>
	</div>
</div>  
@stop