@include('sweetalert::alert')
@if (isset($content) && $content)
    @include($content)
@endif
