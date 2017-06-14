<div class="profile clearfix">
	<div class="profile_pic">
		<img src="{!! asset('images/img.jpg') !!}" alt="..." class="img-circle profile_img">
	</div>
	<div class="profile_info">
		<span>{!! trans('admin/label.welcome') !!}</span>
		<h2>{!! Auth::user()->name !!}</h2>
	</div>
</div>


