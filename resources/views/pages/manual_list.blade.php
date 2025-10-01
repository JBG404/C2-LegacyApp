<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>
    
<h4>Top 5 handleidingen</h4>
    <div class="bread">

        @foreach ($topmanuals as $topmanual)
                @if ($topmanual->brand_id == $brand->id)
                    <a href="{{ route('manual.show', ['brand_id'   => $topmanual->brand_id,'brand_slug' => $brand->name,'manual_id'  => $topmanual->id]) }}"alt="{{ $topmanual->name }}"title="{{ $topmanual->name }}"class="knop">
                        {{ $topmanual->name }}</a>
                <br />
                @endif
            @endforeach
    </div>
<h4>Alle handleidingen</h4>
    <div class="bread">

        @foreach ($manuals as $manual)

            @if ($manual->locally_available)
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}" class="knop">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <a href="{{ route('manual.show', ['brand_id'   => $brand->id,'brand_slug' => $brand->getNameUrlEncodedAttribute(),'manual_id'  => $manual->id]) }}"alt="{{ $manual->name }}"title="{{ $manual->name }}"class="knop">{{ $manual->name }}</a>
            @endif

            <br />
        @endforeach
    </div>


</x-layouts.app>
