<section class="contact" id="contact">
	<div class="container">
		<div class="row m-b-lg animated fadeInDown delayp1">
			<div class="col-lg-12 text-center">
				<div class="navy-line"></div>
				<h1>Contact Us</h1>

				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<hr/>
			</div>
		</div>
		<div class="row m-b-lg ">
			<div class="col-lg-3 col-lg-offset-3 animated fadeInLeft delayp1">
				<address>
					<strong><span class="navy">Company name, Inc.</span></strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					<abbr title="Phone">P:</abbr> (123) 456-7890
				</address>
			</div>
			<div class="col-lg-4 animated fadeInRight delayp1">
				<p class="text-color">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis </p>
			</div>
		</div>

		<div class="row text-center">
			<div class="contact-form col-md-6 col-sm-12 col-xs-12 col-md-offset-3 animated fadeInUp delayp3">
				@if(Session::has('message'))
					{!! Session::get('message') !!}
				@endif

				<ul class="parsley-error-list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>

				{!! Form::open(array('url'=>'home/contact', 'class'=>'form','parsley-validate'=>'','novalidate'=>' ')) !!}
				{{ csrf_field() }}
				<div class="form-group has-feedback">
					<label for="name" class="sr-only">Name</label>
					{!! Form::text('name', null,array('class'=>'form-control', 'placeholder'=>'Your Name*:', 'required'=>'true')) !!}
					<i class="fa fa-user form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label for="email" class="sr-only">Email</label>
					{!! Form::text('sender', null,array('class'=>'form-control', 'placeholder'=>'Your Email*:', 'required'=>'true')) !!}
					<i class="fa fa-envelope form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label for="phone" class="sr-only">Phone</label>
					{!! Form::text('phone', null,array('class'=>'form-control', 'placeholder'=>'Your Phone*:', 'required'=>'true')) !!}
					<i class="fa fa-phone form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label for="postal" class="sr-only">Postal</label>
					{!! Form::text('postal', null,array('class'=>'form-control', 'placeholder'=>'Zip Code*:', 'required'=>'true')) !!}
					<i class="fa fa-home form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label for="subject" class="sr-only">Subject</label>
					{!! Form::text('subject', null,array('class'=>'form-control', 'placeholder'=>'Subject*:', 'required'=>'true')) !!}
					<i class="fa fa-navicon form-control-feedback"></i>
				</div>

				<div class="form-group has-feedback">
					<label for="message" class="sr-only">Message</label>
					{!! Form::textarea('message',null,array('class'=>'form-control', 'placeholder'=>'Message*:', 'required'=>'true')) !!}
					<i class="fa fa-pencil form-control-feedback"></i>
				</div>
				<br>
				<button class="btn btn-sm btn-primary" type="submit">Send mail</button>
				<input type="hidden" name="redirect" value="contact-us">
				{!! Form::close() !!}<!--//form-->
			</div><!--//contact-form-->
		</div><!--//row-->

		<div class="row">
			<div class="col-lg-12 text-center">

				<p class="m-t-sm">
					Or follow us on social platform
				</p>
				<ul class="list-inline social-icon">
					<li><a href="#"><i class="fa fa-twitter"></i></a>
					</li>
					<li><a href="#"><i class="fa fa-facebook"></i></a>
					</li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg animated fadeInUp delayp1">
				<p><strong>&copy; 2015 Company Name</strong><br> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
			</div>
		</div>
	</div>
</section>















