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
  <div class="col-sm-6 col-md-6">

    <div class="box">
      <div class="header">
        <h3>Table Bordered </h3>
      </div>
      <div class="content">
        <table class="table table-bordered">
          <thead class="no-border">
            <tr>
              <th style="width:50%;">Task</th>
              <th>Date</th>
              <th class="text-right">Amount</th>
            </tr>
          </thead>
          <tbody class="no-border-x">
            <tr>
              <td style="width:30%;">Filet Mignon</td>
              <td>05/14/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
            <tr>
              <td style="width:30%;">Blue beer</td>
              <td>16/08/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
            <tr>
              <td style="width:30%;">T-shirts</td>
              <td>22/12/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>    
    
  </div>
  
  <div class="col-sm-6 col-md-6">


    <div class="box">
      <div class="header">              
        <h3>Table Bordered Striped </h3>
      </div>
      <div class="content">
        <table class="table table-bordered table-striped">
          <thead class="no-border">
            <tr>
              <th style="width:50%;">Task</th>
              <th>Date</th>
              <th class="text-right">Amount</th>
            </tr>
          </thead>
          <tbody class="no-border-y">
            <tr>
              <td style="width:30%;">Filet Mignon</td>
              <td>05/14/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
            <tr>
              <td style="width:30%;">Blue beer</td>
              <td>16/08/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
            <tr>
              <td style="width:30%;">T-shirts</td>
              <td>22/12/2013</td>
              <td class="text-right">$5,230.000</td>
            </tr>
          </tbody>
        </table>            
      </div>
    </div>
  </div>

</div>

</div>  
</div>
@stop