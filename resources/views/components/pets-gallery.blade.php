<div class="flex">
    <style>
        .galeria{
            display: flex;
            width: 100%;
            height: 100px;
            transition: .3s ease;
        }

        .galeria img{
            width: 0px;
            flex-grow: 1;
            object-fit: cover;
            opacity: .8;
            transition: .3s ease;
        }

        .galeria img:hover{
            cursor: crosshair;
            width: 150px;
            opacity: 1;
            filter: contrast(120%);
        }

        .galeria:hover{
            height: 200px;
            cursor: crosshair;
        }
    </style>
    
    <section class="galeria">
        @foreach ($getRecord()->getMedia('pets') as $image)
            <img src="{{ $image->getUrl() }}" alt="" width="100" height="100">
        @endforeach
    </section>
</div>