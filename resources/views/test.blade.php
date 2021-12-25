<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/front.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" href="{{asset('css/tourguidesprofiles.css')}}">

<form id="Expertise-edits">
    @csrf
    <select name="expertises" id="expertises" class="custom-select" multiple>
        <option value="Local Cuisine"  >Local Cuisine</option>
        <option value="Local Culture" >Local Culture</option>
        <option value="Safary" >Safary</option>
        <option value="Pick up and Driving Tours">Pick up and Driving Tours</option>
        <option value="Art and Museums">Art and Museums</option>
        <option value="Nightlife and Bars">Nightlife and Bars</option>
        <option value="Exploration and Sightseeing">Exploration and Sightseeing</option>
        <option value="Islamic Cairo">Islamic Cairo</option>
        <option value="Pharaonic Cairo">Pharaonic Cairo</option>
        <option value="Roman Dynasty">Roman Dynasty</option>
        <option value="Modern History">Modern History</option>
        <option value="Christian History">Christian History</option>
        <option value="Christian History" Selected>Biking</option>
    </select>

    <button style="right: 30px;
                                position: absolute;
                                bottom: 30px;
                                width: 100px;
                                height: 40px;
                                background-color: #111;
                                color: #fff;
                                outline: none;
                                border: none;
                                border-radius: 2px;" type="submit" onclick="saveExpertise();return false">Save</button>


</form>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/TweenMax.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/TextPlugin.min.js')}}"></script>
<script src="{{asset('js/CSSPlugin.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slider.js')}}"></script>
<script src="{{asset('js/front.js')}}"></script>
<script src="{{asset('js/profileslider.js')}}"></script>
<script src="{{asset('js/profileJS.js')}}"></script>

<script>
    function saveExpertise()
    {
        var ex = [];
        var expertises = document.getElementById("expertises");
        expertises.map(function(){ ex.push(this.value) });
        console.log(expertise);
    }
</script>
