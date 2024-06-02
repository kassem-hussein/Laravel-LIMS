@props(['name','quantity'=>null,'amount'=>null,'icon','bgColor'])
<div class="dash-card {{$bgColor}}">
    <div class="name"><i class="{{$icon}}"></i>
        {{$name}}</div>
    @if ($quantity)
    <div class="quantity">{{$quantity}}</div>
    @else
    <div class="amount">{{$amount}}</div>
    @endif
</div>

