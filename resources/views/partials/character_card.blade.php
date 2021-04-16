@php $stats = json_decode($character->stats, true) @endphp
<div class="card">
    <div class="card-header">
        <h3>{{ $character->name }}</h3>
    </div>
    <div class="card-body row">
        <div class="col-lg-4">
            <div style="
                    width: 200px;
                    height:300px;
                    background-image: url('{{ $character->image }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
            "></div>
        </div>
        <div class="col-lg-4">
            <h4 class="mb-3">ATTRIBUTES</h4>
            <p>STR: {{ $stats['attributes']['STR'] }}</p>
            <p>DEX: {{ $stats['attributes']['DEX'] }}</p>
            <p>CON: {{ $stats['attributes']['CON'] }}</p>
            <p>INT: {{ $stats['attributes']['INT'] }}</p>
            <p>WIS: {{ $stats['attributes']['WIS'] }}</p>
            <p>CHA: {{ $stats['attributes']['CHA'] }}</p>
        </div>
        <div class="col-lg-4">
            <h4 class="mb-3">WEAPONS</h4>
            @foreach ($stats['weapons'] as $weapon)
                <p>{{ $weapon }}</p>
            @endforeach    
        </div>
    </div>
</div>