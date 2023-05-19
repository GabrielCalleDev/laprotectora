<div class="flex">
    <img src="{{ Vite::asset('resources/img/dog.png') }}" class="h-6 w-6" alt="logo" width="100" height="100">
    {{  $getState() }}
</div>

@pushOnce('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpushOnce