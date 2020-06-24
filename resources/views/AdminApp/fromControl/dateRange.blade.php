<div class="form-group">
    <div class="input-group ">
        <input type="text"  
        @if (isset($daterange))
           id="{{$daterange}}"
        @else
           id="daterange"
        @endif
        class="form-control text-center daterange input-sm">
        <div class="input-group-prepend" >
            <span class="input-group-text">
              <i class="far fa-calendar-alt"></i>
            </span>
          </div>
      </div>
</div>
<input class="form-control input-sm text-center d-none" type="text"
@if (isset($dateBegin))
id="{{$dateBegin}}"
name="{{$dateBegin}}"
@else
id="dateBegin"
name="dateBegin"
@endif>

<input class="form-control input-sm text-center d-none" type="text"
@if (isset($dateEnd))
id="{{$dateEnd}}"
name="{{$dateEnd}}"
@else
id="dateEnd"
name="dateEnd"
@endif>
