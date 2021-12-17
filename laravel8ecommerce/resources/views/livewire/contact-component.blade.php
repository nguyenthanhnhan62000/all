<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Contact us</span></li>
				</ul>
			</div>
			<div class="row">
				@if (session()->has('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<h2 class="box-title">Leave a Message</h2>
								<form wire:submit.prevent="sendMessage"  name="frm-contact">

									<label for="name">Name<span>*</span></label>
									<input wire:model="name" type="text" value="" id="name" name="name" >
									@error('name') <p class="text-danger">{{ $message }}</p> @enderror
									
									<label for="email">Email<span>*</span></label>
									<input wire:model="email" type="text" value="" id="email" name="email" >
									@error('email') <p class="text-danger">{{ $message }}</p> @enderror
									
									<label for="phone">Number Phone</label>
									<input wire:model="phone" type="text" value="" id="phone" name="phone" >
									@error('phone') <p class="text-danger">{{ $message }}</p> @enderror
								
									<label for="comment">Comment</label>
									<textarea wire:model="comment" name="comment" id="comment"></textarea>
									@error('comment') <p class="text-danger">{{ $message }}</p> @enderror
								
									<input type="submit" name="ok" value="Submit" >
									
								</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
								<iframe src="{{$setting->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>Email</b>
											<p>{{ $setting->email }}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>Phone</b>
											<p>{{ $setting->phone }}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>Mail Office</b>
											<p>{{ $setting->address }}</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->

	</main>