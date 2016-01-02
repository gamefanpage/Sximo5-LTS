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
  <div class="col-md-6">
    <div class="box">
        <h1 style="margin-top: 0;">H1 Tag Header <small>Inline heading note</small></h1>
        <p>Vivamus non <a title="" href="#">massa eu massa</a> ornare vulputate id ac velit. <strong>Pellentesque nunc nulla</strong>, faucibus at pretium eu, fringilla ut dui. </p>
        <h2>H2 Tag Header <small>Inline heading note</small></h2>
        <p>Mauris <span class="text-danger">luctus nisi</span> sed erat pharetra nec hendrerit mi sagittis. <span class="text-info">Pellentesque</span> nulla erat, varius nec sagittis a, pretium et est. </p>
        <h3>H3 Tag Header <small>Inline heading note</small></h3>
        <p>Pellentesque habitant <s>morbi tristique</s> senectus et netus et malesuada <span class="text-warning">fames ac turpis</span> egestas. Phasellus a lacus massa</p>
        <h4>H4 Tag Header <small>Inline heading note</small></h4>
        <p>Cras nec nunc sit amet mi <span class="text-success">dictum sagittis</span> id vitae est. Aliquam id dolor non metus aliquam faucibus nec pretium mi <span class="text-muted">vestibulum</span> </p>
        <h5>H5 Tag Header <small>Inline heading note</small></h5>
        <p>Praesent nec leo arcu. <span class="text-semibold">Nulla facilisi</span>. Aenean neque arcu, laoreet <i>in bibendum sed</i>, tincidunt consectetur dolor. </p>
        <h6>H6 Tag Header <small>Inline heading note</small></h6>
        <p>Integer dui felis, <em><span class="text-semibold">varius quis vulputate</span></em> egestas, suscipit ac nisi. <u>Vestibulum sed odio</u> lectus, a dictum enim</p>
    </div>   

  </div>
  <div class="col-md-6">
    <div class="box">
            <h4>Paragraph Text</h4>
            <p>To me this vast ivory-ribbed chest, with the long, unrelieved spine, extending far away from it in a straight line, not a little resembled the hull of a great ship new-laid upon the stocks, when only some twenty of her naked bow-ribs are inserted, and the keel is otherwise, for the time, but a long, disconnected timber.</p>
            <p class="text-right">Herman Melville - Moby-Dick</p>
            
            <h4>Lead Paragraph</h4>
            <p class="lead">'I've heard something like it,' said Alice.</p>
            <p class="text-right">Lewis Carroll - Alice in Wonderland</p>
            
            <h4>Italic</h4>
            <p><i>"Consul," said he, "I have no longer any doubt. I have spotted my man.</i></p>
            <p class="text-right">Jules Verne - Around the World in 80 Days</p>
            
            <h4>Small</h4>
            <small>This is a tiny small text!</small><br>
    </div>     

  </div>
</div> 

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <p class="text-muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
      <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
      <p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
      <p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
      <span class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</span>
    </div>
  </div>
  <div class="col-md-6">
     <div class="box">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Some historic guy</small>
          </blockquote>
          
          <blockquote class="pull-right">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Some historic guy</small>
          </blockquote>
          <div class="clr"></div>
      </div>    
  </div>
</div>           


<div class="row">
          <div class="col-md-4">
            <!-- Unordered list -->
            <div class="block"> <span class="subtitle">Unordered list</span>
              <div class="well">
                <ul>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                </ul>
              </div>
            </div>
            <!-- /unordered list -->
            <!-- Small arrow -->
            <div class="block"> <span class="subtitle">Icons list</span>
              <div class="well">
                <ul class="icons-list">
                  <li><i class="icon-stack"></i> Lorem ipsum dolor sit amet</li>
                  <li><i class="icon-list"></i>Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li><i class="icon-accessibility"></i>Faucibus porta lacus fringilla vel</li>
                </ul>
              </div>
            </div>
            <!-- /small arrow -->
          </div>
          <div class="col-md-4">
            <!-- Ordered list -->
            <div class="block"> <span class="subtitle">Ordered list</span>
              <div class="well">
                <ol>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                </ol>
              </div>
            </div>
            <!-- /ordered-list -->
            <!-- With minus -->
            <div class="block"> <span class="subtitle">Collapsible submenu</span>
              <div class="well">
                <ul class="icons-list">
                  <li><i class="icon-stats2"></i> Lorem ipsum dolor sit amet</li>
                  <li><a data-target="#collapsible-submenu" data-toggle="collapse"><i class="icon-grin"></i> Nulla volutpat aliquam velit</a>
                    <ul class="collapse in" id="collapsible-submenu">
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li><i class="icon-spinner7"></i> Faucibus porta lacus fringilla vel</li>
                </ul>
              </div>
            </div>
            <!-- /with minus -->
          </div>
          <div class="col-md-4">
            <!-- Font icons -->
            <div class="block"> <span class="subtitle">Square list style</span>
              <div class="well">
                <ul class="square">
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                </ul>
              </div>
            </div>
            <!-- /font-icons -->
            <!-- Unstyled list -->
            <div class="block"> <span class="subtitle">Unstyled list</span>
              <div class="well">
                <ul class="list-unstyled">
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                </ul>
              </div>
            </div>
            <!-- /unstyled list -->
          </div>
        </div>

</div>  
</div>
@stop