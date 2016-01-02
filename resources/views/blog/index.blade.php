<div class="wrapper-header ">
    <div class=" container">
    <div class="col-sm-6 ">
      <div class="page-title">
      <h3>  {{ $pageTitle}}  <small>  {{ $pageNote }}  </small></h3>
      </div>
    </div>
    <div class="col-sm-6 ">
      <ul class="breadcrumb pull-right">
      <li><a href="{{ url('') }}"> Home</a></li>
      <li class="active"><a href="{{ url('blog') }}"> {{ $pageTitle}} </a> </li>
      </ul>   
    </div>
      
    </div>
</div>  
  




<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="toolbar-line text-right">
      @if($access['is_add'] ==1)
        <a href="{{ URL::to('blog/update') }}" class="tips btn btn-xs text-primary"  title="{{ Lang::get('core.btn_create') }}">
      <i class="fa fa-plus-circle "></i>&nbsp; Create New Post</a>
      @endif  
        
     
    </div>  
      @if(Session::has('message'))    
           {!! Session::get('message') !!}
      @endif  
       @foreach ($rowData as $row)
        <div class="blog-post">
          <div class="post-item">
            <div class="title"><h3><a href="{{ url('blog/read/'.$row->slug)}}"> {{ $row->title }} </a></h3></div>
            <div class="blog-info-small">
              <i class="fa fa-folder icon-muted"></i> <span>  <a href="{{ URL::to('blog/category/'.$row->alias)}}">{{ $row->name}}</a>  </span> 
              <i class="fa fa-user icon-muted"></i> <span> {{ $row->username }} </span>  
              <i class="fa fa-calendar"></i> <span> {{ date("M j, Y " , strtotime($row->created)) }} </span> 
              <i class="fa fa-comments"></i> <span> <a href="{{ URL::to('blog/read/'.$row->slug.'#comments')}}"> {{ $row->comments }} comments</a> </span> 
            </div>             
            <div class="summary">
            @if(file_exists('./uploads/images/'.$row->image) && $row->image !='' )
                <div style="padding-bottom:10px"><img src="{{ asset('uploads/images/'.$row->image)}}" class="img-responsive" /></div>
            @endif
            
            <?php 
            $content = explode("<hr>",$row->content);
            echo  $content[0] ;
            ?>
               <a href="{{ url('blog/read/'.$row->slug)}}" class="btn btn-white btn-xs text-success"><i class="fa  fa-search "></i> Read More <i class="fa fa-angle-right"></i></a>
            @if($access['is_edit'] ==1)
            <a  href="{{ URL::to('blog/update/'.$row->blogID.'?return='.$return) }}" class="tips btn btn-xs btn-white text-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i> Edit </a>
            @endif
            @if($access['is_remove'] ==1)
              <a href="{{ url('blog/remove/'.$row->blogID)}}"  onclick="sximoDeletePost(this.href); return false; " class="tips btn btn-xs btn-white text-danger" title="{{ Lang::get('core.btn_remove') }}">
              <i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
            @endif            
                
            </div>
            <hr />
          </div>  
          
        </div>  
       @endforeach

        <div class="text-center">      
           {!! $pagination->appends($pager)->render() !!}
        </div>     
     </div>

     <div class="col-md-3">
        @include('blog.sidebar')
     </div>
   </div>
</div>

<style type="text/css">
  .blog-info-small { font-size: 11px; padding: 10px 0; color: #777;} 
  .blog-info-small a { color: #777; }
  .blog-info-small span { color: #777; padding-right: 15px;}


</style>

  <script type="text/javascript">
   function sximoDeletePost( url )
   {
      if(confirm('Delete this post ?'))
      {
          window.location.href = url;
      } else {
        return false;
      }
      return false;
   }
  </script>  

