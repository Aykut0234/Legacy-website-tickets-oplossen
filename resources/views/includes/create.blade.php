<form action="{{ route('manual.store') }}" method="post">
    @csrf
    <select name="brands" id="brands">
        @foreach($brand as $brand)
            <option value="{{$brand->id}}">{{ $brand->name}}</option>
        @endforeach
    </select>
    <input type="text" name="manual_name" id="manual_name" placeholder="Manual naam">
    <input type="text" name="link" id="link" placeholder="Link">
    <button type="submit" name="create">Toevoegen</button>
</form>
