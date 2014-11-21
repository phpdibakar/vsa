@if ($breadcrumbs)
<ol class="breadcrumb">
	@foreach ($breadcrumbs as $breadcrumb)
		@if(count($breadcrumbs) > 1 && $breadcrumb->first)
			<li>
				<i class="{{ $breadcrumb->icon }}"></i>
				<a href="{{{ $breadcrumb->url }}}">
					{{{ $breadcrumb->title }}}
				</a>
			</li>
		@elseif (!$breadcrumb->last)
			<li>
				<a href="{{{ $breadcrumb->url }}}">
					{{{ $breadcrumb->title }}}
				</a>
			</li>
		@elseif($breadcrumb->last && count($breadcrumbs) == 1)
			<li class="active">
				<i class="{{ $breadcrumb->icon }}"></i>
				{{{ $breadcrumb->title }}}
			</li>
		@else
			<li class="active">
				{{{ $breadcrumb->title }}}
			</li>
		@endif
	@endforeach
</ol>
@endif
