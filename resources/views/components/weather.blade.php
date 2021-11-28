<div>
    <h3>{{__('Current Weather in GAZA')}} </h3>

    <div> <i class="fas fa-cloud-sun"></i>
        <h4> درجة الحرارة</h4>{{ $weather['main']['temp'] }}
    </div>
    <div> {{ $weather['weather'][0]['description'] }}</div>
</div>
