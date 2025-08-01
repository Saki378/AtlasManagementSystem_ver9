<x-sidebar>
<div class="pt-5 pb-5" style="height:100%;">
    <div class="border w-75 m-auto pt-3 pb-3 calender_container" style="text-align: center;">
      <p class="pt-3">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
    <div class=" calender-table-btn  m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
      </div>
    </div>
  </div>
</div>
</x-sidebar>
