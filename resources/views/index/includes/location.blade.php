<div id="modalLocation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Выберите ваш город</h4>
        </div>
        <form action="#" id="location_web">
            <div class="modal-body">
				@if(count($locations))
					<ul class="locations">
						@foreach($locations as $key=> $item)
						<li value="{{$key}}">{{$item}}</li>
						@endforeach
					</ul>
				@endif
            </div>
        </form>
    </div>
  </div>
</div>