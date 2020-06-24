    
<select class="form-control select2bs4" id="idWallet" name="idWallet">
    <option value="">-- Chọn Ví -- </option>   
    @foreach (getWallet() as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>