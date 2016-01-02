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
      <div class="box well">
        <div class="header">
            <h3> Basic Tab </h3>
        </div>  
          <div class="tab-container">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#profile" data-toggle="tab">Profile</a></li>
              <li><a href="#messages" data-toggle="tab">Messages</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active use-padding" id="home">
                <h3 class="hthin">Basic Tabs</h3>
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              </div>
              <div class="tab-pane use-padding" id="profile">
                <h2>Typography</h2>
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              </div>
              <div class="tab-pane use-padding" id="messages">
                <p>
Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
              </div>
            </div>
          </div>
      </div>    

      <div class="box well">
          <div class="tab-container tab-left">
            <ul class="nav nav-tabs flat-tabs">
              <li class="active"><a href="#tab3-1" data-toggle="tab"><i class="fa fa-home"></i></a></li>
              <li><a href="#tab3-2" data-toggle="tab"><i class="fa fa-text-height"></i></a></li>
              <li><a href="#tab3-3" data-toggle="tab"><i class="fa fa-camera"></i></a></li>
            </ul>
            <div class="tab-content use-padding">
              <div class="tab-pane active use-padding fade in" id="tab3-1">
                <h3 class="hthin">Left Tabs</h3>
                <ul>
                  <li>Responsive design (BS3)</li>
                  <li>Several UI elements</li>
                  <li>Clean design</li>
                  <li>Love in every single detail</li>
                </ul>
              </div>
              <div class="tab-pane use-padding fade" id="tab3-2">
                <h2>Typography</h2>
                <p>This is just an example of content writen by <b>Jeff Hanneman</b>, as you can see it is a clean design with large
              </div>
              <div class="tab-pane use-padding" id="tab3-3">
                <h2 class="hthin">Typography</h2>
                <p>Pellentesque ac quam hendrerit, viverra leo eu, <b>dapibus mi</b>. In at luctus massa. Morbi semper nulla eu velit facilisis pellentesque. Mauris adipiscing turpis in bibendum tempus. <i>Donec viverra</i>, lacus ac mollis rhoncus, libero risus placerat nisi, et viverra justo eros eget dui. Mauris convallis et tellus non <a href="#">placerat</a>.</p>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce gravida est eros, eget porta leo fringilla et. </p>
                <a href="#">Read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>  
        
  <div class="col-sm-6 col-md-6">  
    <div class="box well"> 
         <div class="header">
            <h3> Tab on Bottom </h3>
        </div>         
    <div class="tab-container tab-bottom">
      <div class="tab-content ">
        <div class="tab-pane active use-padding" id="tab2-1">
          <h3 class="hthin">Basic Tabs</h3>
          <p>This is an example of tabs navigation, you can change the tabs position and use them with icons if you like.</p>
        </div>
        <div class="tab-pane use-padding" id="tab2-2">
          <h2>Typography</h2>
          <p>This is just an example of content writen by <b>Jeff Hanneman</b>, as you can see it is a clean design with large
        </div>
        <div class="tab-pane use-padding" id="tab2-3">
  <h2 class="hthin">Typography</h2>
          <p>Pellentesque ac quam hendrerit, viverra leo eu, <b>dapibus mi</b>. In at luctus massa. Morbi semper nulla eu velit facilisis pellentesque. Mauris adipiscing turpis in bibendum tempus. <i>Donec viverra</i>, lacus ac mollis rhoncus, libero risus placerat nisi, et viverra justo eros eget dui. Mauris convallis et tellus non <a href="#">placerat</a>.</p>
  <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce gravida est eros, eget porta leo fringilla et. </p>
  <a href="#">Read more</a>
  </div>
      </div>
      <ul class="nav nav-tabs flat-tabs">
        <li class="active"><a href="#tab2-1" data-toggle="tab">Home</a></li>
        <li><a href="#tab2-2" data-toggle="tab">Profile</a></li>
        <li><a href="#tab2-3" data-toggle="tab">Messages</a></li>
      </ul>         
    </div>  
  </div>
    
     <div class="box well"> 
          <div class="header">
            <h3> Tab on Right </h3>
        </div>       
        <div class="tab-container tab-right">
          <ul class="nav nav-tabs flat-tabs">
            <li class="active"><a href="#tab4-1" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#tab4-2" data-toggle="tab"><i class="fa fa-text-height"></i></a></li>
            <li><a href="#tab4-3" data-toggle="tab"><i class="fa fa-camera"></i></a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active use-padding fade in" id="tab4-1">
              <h3 class="hthin">Right Tabs</h3>
              <ul>
                <li>Responsive design (BS3)</li>
                <li>Several UI elements</li>
                <li>Clean design</li>
                <li>Love in every single detail</li>
              </ul>             </div>
            <div class="tab-pane fade use-padding" id="tab4-2">
              <h2>Typography</h2>
              <p>This is just an example of content writen by <b>Jeff Hanneman</b>, as you can see it is a clean design with large
            </div>
            <div class="tab-pane use-padding" id="tab4-3">
      <h2 class="hthin">Typography</h2>
              <p>Pellentesque ac quam hendrerit, viverra leo eu, <b>dapibus mi</b>. In at luctus massa. Morbi semper nulla eu velit facilisis pellentesque. Mauris adipiscing turpis in bibendum tempus. <i>Donec viverra</i>, lacus ac mollis rhoncus, libero risus placerat nisi, et viverra justo eros eget dui. Mauris convallis et tellus non <a href="#">placerat</a>.</p>
      <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce gravida est eros, eget porta leo fringilla et. </p>
      <a href="#">Read more</a>
      </div>
          </div>
        </div>          
      </div> 
      </div>     
      
  
  </div>
  
<div class="row">

  <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="panel-group accordion" id="accordion">
      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <i class="fa fa-angle-right"></i> Basic accordion
        </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
        We have a full documentation for every single thing in this template, let's check it out and if you need support with.
        </div>
      </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-angle-right"></i> Collapsible Group Item #2
        </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
        We have a full documentation for every single thing in this template, let's check it out and if you need support with.
        </div>
      </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <i class="fa fa-angle-right"></i> Collapsible Group Item #3
        </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
      </div>
    </div>
    
    
  
  </div>
  
  <div class="col-sm-6">

  
  
  </div>
  
  
</div>  
</div>
</div> 
</div> 
@stop