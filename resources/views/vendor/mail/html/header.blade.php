@props(['url'])
<tr>
<td class="header">
<a href="{{{ route('home.page') }}}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ url('img/logo.png') }}" class="logo" alt="arrogantM Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
