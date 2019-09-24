
<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">{{ __($title) }}</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>
</div>