@if ($errors->any())
    <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Oh snap!</span>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@if (session('warning'))
    <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">{{ session('warning') }}</span>
    </div>
@endif

@if (session('success'))
    <div class="alert bg-success text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">{{ session('success') }}</span>
    </div>
@endif

@if (session('danger'))
<div class="alert bg-danger text-white alert-styled-left alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    <span class="font-weight-semibold">{{ session('danger') }}</span>
</div>
@endif