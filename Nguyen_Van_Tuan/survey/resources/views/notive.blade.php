@php

if ($status == 1){


@endphp

<div class="alert alert-primary" role="alert">
    Feedback was successfull.
</div>

@php

}
@endphp


@php

    if ($status ==0){


@endphp

<div class="alert alert-primary" role="alert">
    Feedback was error.
</div>

@php

    }
@endphp

<a href="{{ URL::previous() }}">Return</a>