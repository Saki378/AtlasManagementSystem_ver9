<x-sidebar>
<div class="pt-5 pb-5" style="height:100%;">
  <div class="border w-75 m-auto pt-3 pb-3 calender_container">
    <div class="w-75 m-auto " style="border-radius:5px;">
      <p class="text-center pt-3">{{ $calendar->getTitle() }}</p>
      <div class="w-75">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
</x-sidebar>
