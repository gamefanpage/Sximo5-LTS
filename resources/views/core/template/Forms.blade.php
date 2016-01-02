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
          <h3>Basic Form</h3>
        </div>
          <div class="content">
    
          <form role="form"> 
          <div class="form-group">
            <label>Email address</label> <input type="email" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-group"> 
            <label>Password</label> <input type="password" class="form-control" placeholder="Password">
          </div> 
          <div class="checkbox">
            <label> <input type="checkbox"> Remember me </label> </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-default">Cancel</button>
          </form>
          
          </div>  
      </div>    
    
    </div>
    
    <div class="col-sm-6 col-md-6">
      <div class="box">
          <div class="header">              
            <h3>Horizontal Form</h3>
          </div>
          <div class="content">
            <form role="form" class="form-horizontal">
              <div class="form-group">
              <label class="col-sm-2 control-label" for="inputEmail3">Email</label>
              <div class="col-sm-10">
                <input type="email" placeholder="Email" id="inputEmail3" class="form-control">
              </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label" for="inputPassword3">Password</label>
              <div class="col-sm-10">
                <input type="password" placeholder="Password" id="inputPassword3" class="form-control">
              </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
                </div>
              </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary" type="submit">Registrer</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
            </form>
          </div>      
      </div>
    </div>
  
  
  </div>

  <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="header">              
            <h3>Basic Elements</h3>
          </div>          
        <form style="border-radius: 0px;" action="#" class="form-horizontal group-border-dashed">
              <div class="form-group">
                <label class="col-sm-3 control-label">Input Text</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Input Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Placeholder Input</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Placeholder text" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Disabled Input</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Disabled input text" class="form-control" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Readonly Input</label>
                <div class="col-sm-9">
                  <input type="text" value="Readonly input text" class="form-control" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Textarea</label>
                <div class="col-sm-9">
                  <textarea class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button class="btn btn-danger" type="submit">Registrer</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>              
            </form>
      </div>
      </div>

      <div class="col-sm-6">
        <div class="box">
          <div class="header">              
            <h3>Select & Option Elements</h3>
          </div>          
        <form style="border-radius: 0px;" action="#" class="form-horizontal group-border-dashed">
              <div class="form-group">
                <label class="col-sm-3 control-label">Basic Select</label>
                <div class="col-sm-9">
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>                 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Multiple Select</label>
                <div class="col-sm-9">
                  <select class="form-control" multiple="">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>                 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Radio</label>
                <div class="col-sm-9">
                  <div class="radio"> 
                    <label> <input type="radio" name="rad1" checked=""> Option 1</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="radio" name="rad1"> Option 2</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="radio" name="rad1"> Option 3</label> 
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Inline Radio</label>
                <div class="col-sm-9">
                  <label class="radio-inline"> <input type="radio" name="rad1" checked=""> Option 1</label> 
                  <label class="radio-inline"> <input type="radio" name="rad1"> Option 2</label> 
                  <label class="radio-inline"> <input type="radio" name="rad1"> Option 3</label> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Checkbox</label>
                <div class="col-sm-9">
                  <div class="radio"> 
                    <label> <input type="checkbox" name="check1" checked=""> Option 1</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="checkbox" name="check2"> Option 2</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="checkbox" name="check3"> Option 3</label> 
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Inline Checkbox</label>
                <div class="col-sm-9">
                  <label class="checkbox-inline"> <input type="checkbox" name="rad1" checked=""> Option 1</label> 
                  <label class="checkbox-inline"> <input type="checkbox" name="rad1"> Option 2</label> 
                  <label class="checkbox-inline"> <input type="checkbox" name="rad1"> Option 3</label> 
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button class="btn btn-success" type="submit">Registrer</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>

            </form>
          </div>
      </div>

  </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="header">              
            <h3>Input Groups</h3>
          </div>          
<form style="border-radius: 0px;" action="#" class="form-horizontal group-border-dashed">
              <div class="form-group">
                <label class="col-sm-3 control-label">Input Text</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" placeholder="Username" class="form-control">
                  </div>
                  <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">.00</span>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Input Sizing</label>
                <div class="col-sm-6">
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">@</span>
                    <input type="text" placeholder="Username" class="form-control">
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" placeholder="Username" class="form-control">
                  </div>

                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">@</span>
                    <input type="text" placeholder="Username" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Checkbox &amp; Radio</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                    <input type="checkbox">
                    </span>
                    <input type="text" class="form-control">
                  </div>  
                  <div class="input-group">
                    <span class="input-group-addon">
                    <input type="radio">
                    </span>
                    <input type="text" class="form-control">
                  </div>                    
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Button Addons</label>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-primary">Go!</button>
                    </span>
                  </div>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control">
                    <div class="input-group-btn">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                    </div>
                  </div>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control">
                    <div class="input-group-btn ">
                      <button type="button" class="btn btn-default" tabindex="-1">Action</button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Readonly Input</label>
                <div class="col-sm-6">
                  <input type="text" value="Readonly input text" class="form-control" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Textarea</label>
                <div class="col-sm-6">
                  <textarea class="form-control"></textarea>
                </div>
              </div>
            </form>
      </div>
      </div>
    </div>  

</div>  
</div>
@stop