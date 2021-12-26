<div class="box box-info padding-1">
    <div class="box-body">
        <input type="text" placeholder="Trip Title" value="{{$trip->name}}" name="tripTitle">
        @if($trip->photo != null)
            <img width="200" height="100" style="position: relative;left: 100px" src="{{asset($trip->photo)}}">
        @endif
        <input type="text" placeholder="Trip Description" value="{{$trip->description}}" name="tripDescription">
        <input type="file" placeholder="Trip Photo" value="{{$trip->photo}}"  name="tripPhoto">
        <input type="number" placeholder="Trip Price" value="{{$trip->price}}" name="tripPrice">
        <hr>
        <h3 style="margin: 15px">Activities</h3>
        @if(json_decode($trip->activities) != [])
            @foreach(json_decode($trip->activities) as $key=> $act)
                @php
                    $activity = \App\Models\Activity::find($act);
                @endphp
                <div id="act{{$key}}">
                    <input type="text" id="actTitle{{$key}}" placeholder="Activity Title" value="{{$activity->name}}" name="actTitle[]">
                    <input type="text" id="actDes{{$key}}" placeholder="Activity Description" value="{{$activity->description}}" name="actDes[]">
                    <input type="number" id="actPrice{{$key}}" placeholder="Activity Price" value="{{$activity->price}}" name="actPrice[]">
                    <input type="hidden" value="{{$act}}" name="actId[]">
                </div>
            @endforeach
        @else
            <div id="act">
                <input type="text" id="actTitle0" placeholder="Activity Title" name="actTitle[]">
                <input type="text" id="actDes0" placeholder="Activity Description" name="actDes[]">
                <input type="number" id="actPrice0" placeholder="Activity Price" name="actPrice[]">
            </div>
            @endif
        <br>
    </div>
</div>
