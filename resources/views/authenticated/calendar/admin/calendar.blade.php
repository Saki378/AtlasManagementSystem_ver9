<x-sidebar>
<div class="w-100 pt-3 pb-3">
  <div class="w-75 m-auto pt-3 pb-3 calender_container">
    <div class="w-75 m-auto" style="text-align: center;">
      <p>{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
    </div>
  </div>
</div>
</x-sidebar>
