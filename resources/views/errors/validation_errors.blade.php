@if($errors->has($field))
    @foreach ($errors->get($field) as $error)
    <label class="label-danger-custom" >{{ $error }}</label>
    @endforeach
@endif