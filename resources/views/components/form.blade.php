<form action="{{$action_link}}" method="{{$send_method}}">
    @csrf
    {{ $slot }}
</form>
