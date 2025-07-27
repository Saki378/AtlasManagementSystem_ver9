<x-sidebar>
<div class=" pt-5 pb-5" style="height:100%;">
  <div class="border w-75 m-auto pt-3 pb-3 calender_container" style="text-align: center;">
    <div  class="table-w m-auto">
      <p class="pt-3">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
    </div>
  </div>
</div>
</x-sidebar>
